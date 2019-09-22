<div class="wrap">
    <h1>SVG  &#8594;  PNG</h1>
    <h3><i>(Featured Image generator for Social Networks)</i></h3>
    <hr>
    <form method="post" action="options.php">
        <?php settings_fields('svg-png-settings-group'); ?>
        <?php do_settings_sections('svg-png-settings-group'); ?>

        <table class="form-table">        

            <tr valign="top">
                <th scope="row">Output PNG Folder</th>
                <td>
                    <span>uploads&nbsp;/&nbsp;</span>
                    <input 
                        type="text" 
                        name="SVG_PNG_FOLDER_PATH" 
                        value="<?php echo esc_attr(get_option('SVG_PNG_FOLDER_PATH')); ?>" 
                        placeholder="PNG Folder"
                        required
                    />
                </td>
            </tr>   

            <tr>
                <th>Image dimensions</th>
                <td>
                    <input type="text" value="1200px" disabled/>
                    <span> &#10005; </span>
                    <input type="text" value="630px" disabled/>
                    <span> [ READ ONLY ] </span>
                </td>
            </tr>
            
            <tr valign="top">
                <th scope="row">Social networks</th>
                <td class="svg2png-td">
                    <div class="chkbox"> 
                        <img src="<?php echo plugins_url('svg2png/assets/twitter_icon.svg'); ?>" alt="">
                        <div class="chk-opt">
                            <span>&nbsp;Twitter&nbsp;</span>
                            <input 
                                type="checkbox" 
                                name="SVG_PNG_TWT_OPTION"
                                id="SVG_PNG_TWT_OPTION"
                                value="1"
                                <?php checked( '1', get_option( 'SVG_PNG_TWT_OPTION' ) ); ?>
                            />
                        </div>
                    </div>

                    <div class="chkbox"> 
                    <img src="<?php echo plugins_url('svg2png/assets/fb_icon.svg'); ?>" alt="">
                        <div class="chk-opt">
                            <span>&nbsp;Facebook&nbsp;</span>
                            <input 
                                type="checkbox" 
                                name="SVG_PNG_FB_OPTION"
                                id="SVG_PNG_FB_OPTION"
                                value="1"
                                <?php checked( '1', get_option( 'SVG_PNG_FB_OPTION' ) ); ?>
                            />
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>
    
    <hr>

    <h3>
    PHP ImageMagick : 
    <?php
        if (!extension_loaded('imagick')){ 
            echo '  <font size="4" color="red">Not Installed</font> (<font size="3" color="#1e86d0"><i> Please check with your host provider </i></font>)';
        } else {
            echo ' <font size="4" color="green">Available</font>. Perfect!';
        }
    ?>
    </h3>
</div>