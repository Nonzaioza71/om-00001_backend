<?php
require_once(__DIR__ . '/BaseModel.php');
class EstimateModel extends BaseModel
{
    public $connection;

    public function __construct()
    {
        $this->connection = BaseModel::Connect();
    }

    public function getEstimateBy()
    {
        $sql = "SELECT * FROM `tb_estimate_list` WHERE TRUE";

        $res = $this->connection->query($sql);
        $data = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getUsersEstimatedBy()
    {
        $sql = "SELECT * FROM `tb_estimate_score` WHERE TRUE GROUP BY user_id";

        $res = $this->connection->query($sql);
        $data = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function insertEstimateBy($arr)
    {

        $sql = "";
        for ($i = 0; $i < count($arr); $i++) {
            $sql .= "
                    INSERT INTO `tb_estimate_list` (`id`, `estimate_title`) VALUES (NULL, '" . $arr[$i]['estimate_title'] . "');
                ";
        }
        // return $sql;
        return $this->connection->multi_query($sql);
    }

    public function getAVGEstimateBy()
    {
        $sql = "SELECT *, SUM(tb_estimate_score.estimate_score) AS raw_score FROM tb_estimate_list
            LEFT JOIN tb_estimate_score ON tb_estimate_score.estimate_id = tb_estimate_list.id
            GROUP BY tb_estimate_list.id;";

        $res = $this->connection->query($sql);
        $data = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getUserAVGEstimatedBy()
    {
        $sql = "SELECT * FROM tb_estimate_score
        GROUP BY tb_estimate_score.user_id;";

        $res = $this->connection->query($sql);
        $data = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function clearEstimateBy()
    {
        $sql = "
                TRUNCATE TABLE `om-00001`.`tb_estimate_list`;
            ";
        return $this->connection->query($sql);
    }
}
