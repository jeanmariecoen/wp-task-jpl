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
    }

    public function create_task( \WP_REST_Request $request )
    {
        $body_request = $request->get_body();
        $array_request = json_decode($body_request,true, 512);
            $title = $array_request['post_title'];
            $content = $array_request['post_content'];
        
        $args = [
            'post_status' => 'publish',
            'post_title' => $title,
            'post_type'	 => 'task',
            'post_content' => $content
        ];

        $post_id = wp_insert_post( $args );

        $args = array(
            'ID' => $post_id
        );
        $query = new \WP_Query( $args );
        return rest_ensure_response($query->posts);

        // ceci ne fonctionne pas...
        $wpdb->insert('wp_tp_tasks', array(
            'post_id'=> $post_id
        ));
    }

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
            'post_status'	 => 'publish',
            'posts_per_page' => -1,
            'post_date' => current_time()
        );
        $query = new \WP_Query( $args );
        return rest_ensure_response($query->posts);
    }

    public function delete_task( \WP_REST_Request $request )
    {
        $body_request = $request->get_body();
        $array_request = json_decode($body_request,true, 512);
            $task_id = $array_request['task_id'];
            
        wp_delete_post($task_id, true);
        return rest_ensure_response();
    }
    
}