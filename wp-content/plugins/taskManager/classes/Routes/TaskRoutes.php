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
            'methods' => 'PUT',
            'callback' => [$this,"update_task"],
        ));
        register_rest_route('taskManager/v0', '/task/(?P<id>\d+)', array(
            'methods' => 'DESTROY',
            'callback' => [$this,"delete_task"],
        ));
    }

    public function create_task( \WP_REST_Request $request )
    {
        $request->get_body();
        $title =  $request->get_params('post_title');
        $args = [
            'post_title' => $title
        ];
        $post_id = wp_insert_post( $args );

        $wpdb->insert('wp_tp_tasks', array(
            'post_id'=> $post_id
        ));
        return rest_ensure_response(json_encode($args));
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
            'post_type'	 => 'task',
            'post_status'	 => 'publish',
            'posts_per_page' => -1,
            'post_date' => current_time()
        );
        $query = new \WP_Query( $args );
        return rest_ensure_response($query->posts);
    }
    
}