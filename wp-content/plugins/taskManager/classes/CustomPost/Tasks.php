<?php


namespace TaskManager\CustomPost;


class TaskPostType
{
    public function __construct(  )
    {
        $this->create_task_post_type();
    }

    public function create_task_post_type()
    {
        $labels = array(
            'name'                => _x( 'Tâches', 'Post Type General Name', 'task'),
            'singular_name'       => _x( 'Tâche', 'Post Type Singular Name', 'task'),
            'menu_name'           => __( 'Fiction', 'task'),
            'all_items'           => __( 'All Fiction', 'task'),
            'view_item'           => __( 'View all fiction', 'task'),
            'add_new_item'        => __( 'Add new fiction', 'task'),
            'add_new'             => __( 'Add', 'task'),
            'edit_item'           => __( 'Edit', 'task'),
            'update_item'         => __( 'Modify', 'task'),
            'search_items'        => __( 'Search', 'task'),
            'not_found'           => __( 'Not found', 'task'),
            'not_found_in_trash'  => __( 'Not found in the trash', 'task'),
        );

        $args = array(
            'label'               => __( 'Tâche', 'task'),
            'description'         => __( 'Everything is a task', 'task'),
            'labels'              => $labels,
            'supports'            => array( 'title' ),
            'show_in_rest'        => true,
            'hierarchical'        => false,
            'public'              => true,
            'has_archive'         => true,
            'rewrite'			  => array( 'slug' => 'task-post'),

        );

        register_post_type( 'fictional', $args );
    }
}