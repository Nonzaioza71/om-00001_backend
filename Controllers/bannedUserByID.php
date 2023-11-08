<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=utf-8');

    require_once('../Models/UserModel.php');
    $user_model = new UserModel();

    $data = json_decode(file_get_contents('php://input'), true);

    $res = false;
    
    if($data['isBanned']){
        $res = $user_model->insertBannedUserByID($data['user_id']);
    }else{
        $res = $user_model->deleteBannedUserByID($data['user_id']);
    }

    echo json_encode($res);
