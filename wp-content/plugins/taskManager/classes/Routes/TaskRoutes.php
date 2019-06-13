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
        register_rest_route('ubermanager/v0', '/tasks/(?P<id>\d+)', array(
            'methods' => 'GET',
            'callback' => [$this,"get_task_with_id"],
        ));
        register_rest_route('ubermanager/v0', '/tasks', array(
            'methods' => 'GET',
            'callback' => [$this,"get_all_tasks"],
        ));
        register_rest_route('ubermanager/v0', '/tasks', array(
            'methods' => 'POST',
            'callback' => [$this,"create_task"],
        ));
    }

    public function get_all_tasks()
    {
        $args = array(
            'post_type'	 => 'ubertasks',
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
            'post_type'	 => 'ubertasks',
            'post_status'	 => 'publish',
            'posts_per_page' => -1
        );
        $query = new \WP_Query( $args );
        return rest_ensure_response($query->posts);
    }

    public function create_task( \WP_REST_Request $request )
    {
        //$request->get_body();
        $args = [
            'post_title' => "Tarabuster les pommes de terres"
        ];
        wp_insert_post( $args );
        return rest_ensure_response(json_encode($args));
    }
    
}