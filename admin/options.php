<div class="wrap">
    <h1>ImageData Options</h1>
    <form method="post" action="options.php">
        <?php settings_fields('imagedata-options-group'); ?>
        <?php do_settings_sections('imagedata-options-group'); ?>
        <table class="form-table">
            <tr>
                <th>Phone Number:</th>
                <td><input type="text" name="phone_number" value="<?php echo esc_attr(get_option('phone_number')); ?>"/></td>
            </tr>
            <tr>
                <th>Main Email Address:</th>
                <td><input type="text" name="email_address" value="<?php echo esc_attr(get_option('email_address')); ?>"/></td>
            </tr>
            <tr>
                <th>LinkedIn Url:</th>
                <td><input type="url" name="linked_in_url" value="<?php echo esc_attr(get_option('linked_in_url')); ?>"/></td>
            </tr>
            <tr>
                <th>Twitter Url:</th>
                <td><input type="url" name="twitter_url" value="<?php echo esc_attr(get_option('twitter_url')); ?>"/></td>
            </tr>
            <tr>
                <th>Pinterest Url:</th>
                <td><input type="url" name="pinterest_url" value="<?php echo esc_attr(get_option('pinterest_url')); ?>"/></td>
            </tr>
            <tr>
                <th>Careers Url:</th>
                <td><input type="url" name="careers_url" value="<?php echo esc_attr(get_option('careers_url')); ?>"/></td>
            </tr>
            <tr>
                <th>Modern Slavery Act Url:</th>
                <td><input type="url" name="modern_slavery_act_url" value="<?php echo esc_attr(get_option('modern_slavery_act_url')); ?>"/></td>
            </tr>
            <tr>
                <th>Plant List Url:</th>
                <td><input type="url" name="plant_list_url" value="<?php echo esc_attr(get_option('plant_list_url')); ?>"/></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
