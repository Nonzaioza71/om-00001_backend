<?php
    if (array_key_exists('app', $_GET)) {
        switch ($_GET['app']) {
            case 'logout':
                require_once('Components/Logout/index.inc.php');
                break;
            
            case 'static_board':
                require_once('Components/StaticBoard/index.inc.php');
                break;
            
            case 'static_estimate':
                require_once('Components/StaticEstimate/index.inc.php');
                break;
            
            case 'static_user':
                require_once('Components/StaticUser/index.inc.php');
                break;
            
            case 'manage_board':
                require_once('Components/ManageBoard/index.inc.php');
                break;
            
            case 'manage_estimate':
                require_once('Components/ManageEstimate/index.inc.php');
                break;
            
            case 'manage_user':
                require_once('Components/ManageUser/index.inc.php');
                break;
            
            default:
                require_once('Components/Overview/index.inc.php');
                break;
        }
    } else {
        require_once('Components/Overview/index.inc.php');
    }
    