<?php

// Создать пользовательское меню
add_action('admin_menu', 'register_my_custom_submenu_page');


function register_my_custom_submenu_page()
{
    add_submenu_page('themes.php', 'Настройка темы', 'Настройка темы', 'manage_options', 'my-custom-submenu-page', 'my_custom_submenu_page_callback');
}

function my_custom_submenu_page_callback()
{
    if (isset($_POST['settings'])) {
        unset($_POST['settings']);
        //        $_POST['working_days'] = join(',', $_POST['working_days']);
        foreach ($_POST as $option => $value) {
            update_option($option, $value);
        }
    }
    ?>
<div class="wrap">
    <h2>Настройка темы</h2>

    <form method="post" action="themes.php?page=my-custom-submenu-page">
        <input type="hidden" name="settings">
        <table class="form-table">

            <th scope="row"><h3>Баннеры</h3><th scope="row">

            <tr valign="top" class="top_banner">
                <th scope="row">Верхний (адрес баннера) 726 × 90</th>
                <td><input style="width:400px; height:25px;" type="text" name="top_banner_path"
                           value="<?php echo get_option('top_banner_path');?>"/>
                </td>

            </tr>
            <tr valign="top">
                <th scope="row">Верхний (URL)</th>
                <td><input style="width:400px; height:25px;" type="text" name="top_banner_url"
                           value="<?php echo get_option('top_banner_url');?>"/>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Нижний (адрес баннера) 160 × 600</th>
                <td><input style="width:400px; height:25px;" type="text" name="bottom_banner_path"
                           value="<?php echo get_option('bottom_banner_path');?>"/>
                </td>

            </tr>
            <tr valign="top" class="bottom_banner">
                <th scope="row">Нижний (URL)</th>
                <td><input style="width:400px; height:25px;" type="text" name="bottom_banner_url"
                           value="<?php echo get_option('bottom_banner_url');?>"/>
                </td>
            </tr>

            <th scope="row"><h3>Соц сети</h3><th scope="row">
            <tr valign="top">
                <th scope="row">vk.com</th>
                <td><input style="width:400px; height:25px;" type="text" name="student_vk"
                           value="<?php echo get_option('student_vk', 'http://vk.com');?>"/>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">mail.ru</th>
                <td><input style="width:400px; height:25px;" type="text" name="student_mail"
                           value="<?php echo get_option('student_mail', 'http://mail.ru');?>"/>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">twitter</th>
                <td><input style="width:400px; height:25px;" type="text" name="student_twitter"
                           value="<?php echo get_option('student_twitter', 'http://twitter.com/');?>"/>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">google +</th>
                <td><input style="width:400px; height:25px;" type="text" name="student_google"
                           value="<?php echo get_option('student_google', 'https://plus.google.com');?>"/>
                </td>
            </tr>


            <style>
                .bottom_banner {
                    border-bottom: 1px solid #888;
                }
            </style>
        </table>

        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>"/>
        </p>
    </form>
</div>
<?php

}