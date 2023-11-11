<?php
    require_once('Models/EstimateModel.php');
    $estimate_model = new EstimateModel();

    $estimates_list = $estimate_model->getEstimateBy();
    
    require_once(__DIR__."/view.inc.php");