<?php
    require_once('Models/EstimateModel.php');
    $estimate_model = new EstimateModel();

    $estimates_avg_list = $estimate_model->getAVGEstimateBy();
    $users_estimated = $estimate_model->getUsersEstimatedBy();

    require_once(__DIR__."/view.inc.php");