<?php

//echo site_url();
if(site_url() == "http://hellodolly.local"){
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->get("Version"));
}
    

//BASIC THEME SUPPORT / AFTER THEME SETUP 18.2
function philosophy_theme_setup(){
    load_theme_textdomain( "philosophy" );
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("html5",array('search-form','comment-list'));
    add_theme_support('post-formats',array("image","gallery","quote","audio","video","link"));
    add_editor_style("/assets/css/editor-style.css");
    
    
}
add_action("after_setup_theme", "philosophy_theme_setup");

//SCRIPTS ENQUEUE 18.3
function philosophy_assets(){
    wp_enqueue_style("font-awesome-css", get_theme_file_uri("/assets/css/font-awesome/css/font-awesome.min.css"),null, 1.0);
    wp_enqueue_style("fonts-css", get_theme_file_uri("/assets/css/fonts.css"), null, 1.0);
    wp_enqueue_style("vendor-css",get_theme_file_uri("/assets/css/vendor.css"),null, 1.0);
    wp_enqueue_style("base-css",get_theme_file_uri("/assets/css/base.css"),null, 1.0);
    wp_enqueue_style("main-css", get_theme_file_uri("assets/css/main.css"),null, 1.0);
    wp_enqueue_style("philosophy-css", get_stylesheet_uri(), null, VERSION);
    
    wp_enqueue_scripts("modernizr-js", get_theme_file_uri("/assets/js/modernizr.js"), null, 1.0);
    wp_enqueue_scripts("pace-js", get_theme_file_uri("/assets/js/pace.min.js"), null, 1.0);
    wp_enqueue_scripts("plugins-js", get_theme_file_uri("/assets/js/plugins.js"), array("jquery"), 1.0, true);
    wp_enqueue_scripts("main-js", get_theme_file_uri("/assets/js/main.js"), array("jquery"), 1.0, true);
}
add_action("wp_enqueue_scripts","philosophy_assets");


