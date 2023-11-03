<?php
    require_once(__DIR__.'/BaseModel.php');
    class EstimateModel extends BaseModel
    {
        public $connection;

        public function __construct() {
            $this->connection = BaseModel::Connect();
        }

        public function getEstimate() {
            $sql = "SELECT * FROM `tb_estimate_list` WHERE TRUE";

            $res = $this->connection->query($sql);
            $data = [];
            if($res->num_rows > 0){
                while ($row = $res->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        public function insertEstimateBy($arr) {

            $sql = "";
            for ($i=0; $i < count($arr); $i++) { 
                $sql += "
                    INSERT INTO `tb_estimate_list` (`id`, `estimate_title`) VALUES (NULL, '".$arr[$i]['estimate_title']."');
                ";
            }
            // return $sql;
            return $this->connection->query($sql);
        }

        public function clearEstimateBy() {
            $sql = "
                TRUNCATE TABLE `om-00001`.`tb_estimate_list`;
            ";
            return $this->connection->query($sql);
        }
    }
    