<?php
    include plugin_dir_path(__FILE__) . 'generate.php';
    
    if (extension_loaded('imagick')){ 
        add_action('save_post', 'refresh_feature_image');
        add_action( 'wp_head', 'add_meta_tags' , 1 );
    }

    function add_meta_tags($post_id){
        return load_template(dirname( __FILE__ ) . '/meta-tags.php', true);
    }

    function refresh_feature_image($post_id) {

        if(empty(get_option('SVG_PNG_FOLDER_PATH'))){
            return ;
        }

        if (has_post_thumbnail( $post_id ) ) {

            $url = wp_get_attachment_url( get_post_thumbnail_id($post_id), 'thumbnail' );
        
            $file = new SplFileInfo($url);
            $ext  = $file->getExtension();
    
            if($ext != 'svg'){
                return;
            }
            
            $file_hash = hash_file('sha1', $url);
            $stored_hash = get_post_meta($post_id, 'svg-png-image-hash', false);
            
            if(empty($stored_hash) || ($stored_hash[0] != $file_hash)){

                update_post_meta($post_id, 'svg-png-image-hash', $file_hash);
    
                $upload = wp_upload_dir();

                $upload_dir = $upload['basedir'];
    
                $filename = explode('.', $file->getFilename())[0];
    
                $fullpath = $upload_dir . '/' . get_option('SVG_PNG_FOLDER_PATH') . '/' . $filename . '.png';
                $basepath = $upload['baseurl'] . '/' . get_option('SVG_PNG_FOLDER_PATH') . '/' . $filename . '.png';
    
                feature_image_png($url, $fullpath);

                update_post_meta($post_id, 'svg-image-featured-png', $basepath);

            }
        }
    }
?>