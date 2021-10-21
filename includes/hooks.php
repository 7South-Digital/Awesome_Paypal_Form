<?php 
add_action('wp_ajax_nopriv_afp_send_payment', 'afp_send_payment');
add_action('wp_ajax_afp_send_payment', 'afp_send_payment');

if (!function_exists("afp_add_admin_page")) {
    add_action('admin_menu', 'afp_add_admin_page');
    // Add a new top level menu link to the ACP
    function afp_add_admin_page()
    {
        add_menu_page(
            'Awesome Form Paypal Admin', // Title of the page
            'Awesome Form', // Text to show on the menu link
            'manage_options', // Capability requirement to see the link
            'AformPaypal',
            'afp_admin' // The 'slug' - file to display when clicking the link
        );
    }
}

function afp_admin()
{
   
    ob_start();
    include_once AFP_PLUGIN_TEMPLATES_PATH . 'admin.php';
    $template = ob_get_contents();
    ob_end_clean();
    echo $template;
}