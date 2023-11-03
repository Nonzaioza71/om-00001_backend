<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=utf-8');

    require_once('../Models/EstimateModel.php');
    $estimate_model = new EstimateModel();

    $data = json_decode(file_get_contents('php://input'), true);

    $task = [];
    $task[1] = $estimate_model->clearEstimateBy();
    $task[2] = $estimate_model->insertEstimateBy($data['data']);

    $res = boolval($task[1] && $task[2]);

    // echo json_encode($data['data']);
    echo json_encode($task[2]);
