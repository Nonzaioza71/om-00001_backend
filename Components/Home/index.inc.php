<?php
    require_once('./Models/UserModel.php');
    $user_model = new UserModel();

    $path = __DIR__;


    $user_rating = $user_model->getUserRating();
    $users = $user_model->getUsersBy();
    $users_view_count = count($user_rating);
    $users_count = count($users);


    require_once($path."/view.inc.php");