<?php
    require_once('Models/UserModel.php');
    require_once('Models/BoardModel.php');
    require_once('Models/EstimateModel.php');

    $user_model = new UserModel();
    $board_model = new BoardModel();
    $estimate_model = new EstimateModel();

    $views_count_list = $user_model->getUserRating();
    $views_count = count($views_count_list);

    $users_count_list = $user_model->getUsersBy();
    $users_count = count($users_count_list);

    $boards_count_list = $board_model->getBoardsBy();
    $boards_count = count($boards_count_list);

    $users_estimated_list = $estimate_model->getUsersEstimatedBy();
    $users_estimated_count = count($users_estimated_list);

    require_once(__DIR__.'/view.inc.php');