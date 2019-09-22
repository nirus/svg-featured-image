<?php

    $featured_img = get_post_meta($post->ID, 'svg-image-featured-png', false);
    if( empty($featured_img) ){
        return;
    }

    $file = new SplFileInfo($featured_img[0]);
    $file_info = $file->getFilename();
    
    $upl = wp_upload_dir();
    $upl_dir = $upl['basedir'];

    if(!file_exists($upl_dir . '/' . get_option('SVG_PNG_FOLDER_PATH') . '/' .$file_info) ){
        update_post_meta($post->ID, 'svg-png-image-hash', '');    
        return;
    } 
?>
        <!-- SVG Featured Image plugin : generated Meta tags-->
<?php if(!empty( get_option( 'SVG_PNG_TWT_OPTION' ) )){ ?>
        <meta name="twitter:image" content="<?php echo esc_attr($featured_img[0])?>">
<?php } ?>
<?php if(!empty( get_option( 'SVG_PNG_FB_OPTION' ) )){ ?>
        <meta property="og:image" content="<?php echo esc_attr($featured_img[0])?>">
<?php } ?>
        <!-- SVG Featured Image plugin : generated Meta tags : http://nirus.io -->

