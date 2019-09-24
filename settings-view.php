<div class="wrap">
    <h1>SVG  &#8594;  PNG</h1>
    <h3><i>(Featured Image generator for Social Networks)</i></h3>
    <hr>
    <form method="post" action="options.php">
        <?php settings_fields('sfi-nirus-settings-group'); ?>
        <?php do_settings_sections('sfi-nirus-settings-group'); ?>

        <table class="form-table">        

            <tr valign="top">
                <th scope="row">Output PNG Folder</th>
                <td>
                    <span>uploads&nbsp;/&nbsp;</span>
                    <input 
                        type="text" 
                        name="SFI_NIRUS_PNG_FOLDER_PATH" 
                        value="<?php echo esc_attr(get_option('SFI_NIRUS_PNG_FOLDER_PATH')); ?>" 
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
                <td class="sfi-nirus-svg2png-td">
                    <div class="chkbox"> 
                        <img src="<?php echo plugins_url('assets/twitter_icon.svg', __FILE__); ?>" alt="">
                        <div class="chk-opt">
                            <span>&nbsp;Twitter&nbsp;</span>
                            <input 
                                type="checkbox" 
                                name="SFI_NIRUS_TWT_OPTION"
                                id="SFI_NIRUS_TWT_OPTION"
                                value="1"
                                <?php checked( '1', get_option( 'SFI_NIRUS_TWT_OPTION' ) ); ?>
                            />
                        </div>
                    </div>

                    <div class="chkbox"> 
                    <img src="<?php echo plugins_url('assets/fb_icon.svg', __FILE__); ?>" alt="">
                        <div class="chk-opt">
                            <span>&nbsp;Facebook&nbsp;</span>
                            <input 
                                type="checkbox" 
                                name="SFI_NIRUS_FB_OPTION"
                                id="SFI_NIRUS_FB_OPTION"
                                value="1"
                                <?php checked( '1', get_option( 'SFI_NIRUS_FB_OPTION' ) ); ?>
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

    <h4>
    Safe SVG plugin : 
    <?php
        if (class_exists( 'safe_svg' )){ 
            echo ' <font size="2" color="green">Available</font>. Perfect!';    
        } else {
            echo '  <font size="2" color="#b35050">Not Installed</font> (<font size="2" color="green"><i> Recommended Install <a href="https://wordpress.org/plugins/safe-svg/" target="_blank">Safe SVG</a></i></font> )';
            echo '<div class="sfi-nirus-message">** This is not mandatory. You can install plugin of your choice that enables SVG support.</div>';
        }
    ?>
    </h4>
</div>