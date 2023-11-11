<?php
    session_start();
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=utf-8');

    require_once('../Models/UserModel.php');
    $user_model = new UserModel();

    $data = json_decode(file_get_contents('php://input'), true);


    $res = $user_model->updateUserByID(
        $data['user_prefix'],
        $data['user_name'],
        $data['user_lastname'],
        $data['user_gender'],
        $data['user_national_card'],
        $data['user_birthday'],
        $data['user_id']
    );

    echo json_encode($res);
