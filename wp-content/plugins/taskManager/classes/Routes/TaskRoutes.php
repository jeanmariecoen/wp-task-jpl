<?php


namespace TaskManager\Routes;


class TaskRoutes
{

    /**
     * TaskRoutes constructor.
     */
    public function __construct()
    {
        $this->create_task_routes();
    }

    public function create_task_routes()
    {
        register_rest_route('taskManager/v0', '/task', array(
            'methods' => 'POST',
            'callback' => [$this,"create_task"],
        ));
        register_rest_route('taskManager/v0', '/task/(?P<id>\d+)', array(
            'methods' => 'GET',
            'callback' => [$this,"get_task_with_id"],
        ));
        register_rest_route('taskManager/v0', '/task', array(
            'methods' => 'GET',
            'callback' => [$this,"get_all_tasks"],
        ));
        register_rest_route('taskManager/v0', '/task/(?P<id>\d+)', array(
            'methods' => 'PATCH',
            'callback' => [$this,"update_task"],
        ));
        register_rest_route('taskManager/v0', '/task/(?P<id>\d+)', array(
            'methods' => 'DELETE',
            'callback' => [$this,"delete_task"],
        ));
        // register_rest_route('taskManager/v0', '/login', array(
        //     'methods'  => 'POST',
        //     'callback' => [$this,"login"],
        //     )
        // ));
       

    public function create_task( \WP_REST_Request $request )
    {

        // $body_request = $request->get_body();
        // $object_request = json_decode($request, false);
        $body_request = $request->get_body();
        $array_request = json_decode($body_request,true, 512);

            $title = $array_request['post_title'];
            $content = $array_request['post_content'];
            // $author = $array_request['post_author'];
        
        $args = [
            'post_status'       =>  'publish',
            'post_title' => $title,
            'post_content' => $content,
            'post_type' => 'task',
            // 'post_author' => $author,
        ];

        $post_id = wp_insert_post( $args );

        $wpdb->insert('wp_tp_tasks', array(
            'post_id'=> $post_id
        ));

    }

    // public function login( \WP_REST_Request $request )
    // {

    //     // $body_request = $request->get_body();
    //     // $object_request = json_decode($request, false);
    //     $body_request = $request->get_body();
    //     $array_request = json_decode($body_request,true, 512);

    //         $user = $array_request['user'];
    //         $password = $array_request['password'];
        
    //     $args = [
    //         'user_login' => $user,
    //         'user_pass' => $password,
    //     ];

    //     $post_id = wp_insert_post( $args );

    //     $wpdb->insert('wp_tp_tasks', array(
    //         'post_id'=> $post_id
    //     ));

    // }

    public function get_all_tasks()
    {
        $args = array(
            'post_type'	 => 'task',
            'post_status'	 => 'publish',
            'posts_per_page' => -1
        );
        $query = new \WP_Query( $args );

      
        return rest_ensure_response($query->posts);
    }

    public function get_task_with_id()
    {
        /**
         * Todo: get the id for the task and return the given task
         */
        $args = array(
            'post_type'	 => 'task',
            'post_status'	 => 'publish',
            'posts_per_page' => -1,
            'post_date' => current_time()
        );
        $query = new \WP_Query( $args );
        return rest_ensure_response($query->posts);
    }


// API custom endpoints for WP-REST API


   
    
}