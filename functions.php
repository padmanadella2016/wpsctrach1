<?php 
// adding css and js files
function gt_setup(){
    wp_enqueue_style('google-fonts','https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab');
    wp_enqueue_style('fontawesome','https://use.fontawesome.com/releases/v5.1.0/css/all.css');
    wp_enqueue_style('style',get_stylesheet_uri(),Null,microtime(),all);
    wp_enqueue_script("main",get_theme_file_uri('/js/main.js'),NULL,microtime(),true);
    }
    add_action('wp_enqueue_scripts', 'gt_setup');

    //adding theme support 
    function gt_init(){
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('html5',
        array('comment-list', 'comment-form','search-form'));
    }
    add_action('after_setup_theme', 'gt_init');

    //projects post type

    function gt_custom_post_type(){
        register_post_type('project',
        array(
            'rewrite'=> array('slug' =>'projects'),
            'labels'=> array(
                'name' => 'Projects',
                'singular-name'=>'Project',
                'add-new-item' => 'Add New Project',
                'edit-item'=>'Edit Project'
            ),
        'menu-icon'=>'dashicons-clipboard',
        'public'=>true,
        'supports'=>array('title','thumbnail','editor','excerpt','comments'
        )                
       )
    );
    } add_action('init', 'gt_custom_post_type');