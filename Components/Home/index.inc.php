<?php
    require_once('./Models/UserModel.php');
    require_once('./Models/EstimateModel.php');
    $user_model = new UserModel();
    $estimate_model = new EstimateModel();

    $path = __DIR__;


    $user_rating = $user_model->getUserRating();
    $users = $user_model->getUsersBy();
    $users_view_count = count($user_rating);
    $users_count = count($users);

    $estimate_list = $estimate_model->getAVGEstimateBy();


    require_once($path."/view.inc.php");