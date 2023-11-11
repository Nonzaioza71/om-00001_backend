<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('Views/header.inc.php'); ?>
</head>
<body class=" overflow-hidden">
    <?php 
        session_start();
        $user = isset($_SESSION['user_data']) ? $_SESSION['user_data'] : null;
        if (isset($user)) {
            $user['user_image'] = 'Templates\assets\imgs\\' . $user['user_role'] . '_' . $user['user_gender'] . '.png';
        }
        require_once('Views/body.inc.php'); 
        require_once('Views/footer.inc.php'); 
    ?>
</body>
</html>