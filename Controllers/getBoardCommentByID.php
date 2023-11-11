<?php
    session_start();
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=utf-8');

    require_once('../Models/BoardModel.php');
    $board_model = new BoardModel();

    $data = json_decode(file_get_contents('php://input'), true);

    $res = $board_model->getBoardCommentByID($data['board_id']);
    $admin_comments = $board_model->getBoardCommentByAdminID($data['board_id']);

    for ($i=0; $i < count($admin_comments); $i++) { 
        if ($admin_comments[$i]['user_id'] > 0) {
            $res[count($res)+$i] = $admin_comments[$i];
        }
    }

    echo json_encode($res);
