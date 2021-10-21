<?php 
    require_once AFP_PLUGIN_INCLUDE_PATH ."settings.php";
    use Plugin\Afp_Settings;

    $settings = new Afp_Settings();

$default_tab = null;
$tab = isset($_GET['afp_tab'])? trim($_GET['afp_tab']) : $default_tab;
?>
<div class="content-fluid">

    <nav class="nav-tab-wrapper">
        <a href="?page=AformPaypal" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">Style</a>
        <a href="?page=AformPaypal&afp_tab=paypal" class="nav-tab <?php if($tab==='paypal'):?>nav-tab-active<?php endif; ?>">Paypal</a>
        <a href="?page=AformPaypal&afp_tab=mail" class="nav-tab <?php if($tab==='mail'):?>nav-tab-active<?php endif; ?>">Mail</a>
    </nav>
    <div class="tab-content">
        <?php switch($tab) :
            case 'paypal':
                include_once  AFP_PLUGIN_TEMPLATES_PATH.'paypal.php';
                break;
            case 'mail':
                ob_start();
                include_once  AFP_PLUGIN_TEMPLATES_PATH.'mail.php';
                $template = ob_get_contents();
                ob_end_clean();
                echo $template;
                break;
            default:
                ob_start();
                include_once  AFP_PLUGIN_TEMPLATES_PATH.'style.php';
                $template = ob_get_contents();
                ob_end_clean();
                echo $template;
                break;
            endswitch; ?>
    </div>
</div>