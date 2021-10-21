<?php

if (!function_exists('afp_add_items_sc')) {
    function afp_add_items_sc()
    {
        ob_start();
        include AFP_PLUGIN_TEMPLATES_PATH . 'form.php';
        $content = ob_get_clean();
        return $content;        
    }
    add_shortcode('AFP_Form', 'afp_add_items_sc');
}