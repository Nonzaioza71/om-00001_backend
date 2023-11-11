<?php
    require_once('Models/UserModel.php');

    $user_model = new UserModel();

    $views_count_list = $user_model->getUserRating();
    $views_count = count($views_count_list);

    $users_count_list = $user_model->getUsersBy();
    $users_count = count($users_count_list);

    $keyword = "";
    if (array_key_exists('keyword', $_GET)) {
        $keyword = $_GET['keyword'];
    }
    $search_users = $user_model->getUsersBy($keyword);

    require_once(__DIR__ . "/view.inc.php");
