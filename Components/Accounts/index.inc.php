<?php
    require_once('./Models/UserModel.php');
    $user_model = new UserModel();
    if (array_key_exists('app', $_GET)) {
        if ($_GET['app'] != '?') {
            // echo '<script>window.location.href = "?"</script>';
        }
    }

    $users_list = $user_model->getUsersBy();

    $path = __DIR__;
    if (array_key_exists('view', $_GET)) {
        switch ($_GET['view']) {
            case 'detail':
                require_once($path."/detail.inc.php");
                break;
            
            default:
                require_once($path."/view.inc.php");
                break;
        }
    }else{
        require_once($path."/view.inc.php");
    }
    