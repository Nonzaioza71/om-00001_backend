<?php
require_once(__DIR__ . '/BaseModel.php');
class BoardModel extends BaseModel
{
    public $connection;

    public function __construct()
    {
        $this->connection = BaseModel::Connect();
    }

    public function getBoardsBy()
    {
        $sql = "SELECT tb_boards.*, COUNT(tb_board_reply.user_id) AS comments_count FROM tb_boards
        LEFT JOIN tb_board_reply ON tb_board_reply.board_id = tb_boards.id
        GROUP BY tb_boards.id ORDER BY `tb_boards`.`id` DESC";

        $res = $this->connection->query($sql);
        $data = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getBoardsByID($id)
    {
        $sql = "SELECT tb_boards.*, COUNT(tb_board_reply.user_id) AS comments_count FROM tb_boards
        LEFT JOIN tb_board_reply ON tb_board_reply.board_id = tb_boards.id
        WHERE tb_boards.id = $id;";

        $res = $this->connection->query($sql);
        $data = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data[0];
    }

    public function updateBoardByID($id, $board_title, $board_detail, $board_image) {
        $sql = "UPDATE `tb_boards` SET 
            `board_title` = '$board_title', 
            `board_detail` = '$board_detail', 
            `board_image` = '$board_image', 
            `update_date` = NOW() 
            WHERE `tb_boards`.`id` = $id
        ";
        // return $sql;
        return $this->connection->query($sql);
    }

    public function insertBoardBy($board_title, $board_detail, $board_image) {
        $sql = "INSERT INTO `tb_boards` (
            `id`, 
            `board_title`, 
            `board_detail`, 
            `board_image`, 
            `add_date`, 
            `update_date`
            ) VALUES (
                NULL, 
                '$board_title', 
                '$board_detail', 
                '$board_image', 
                NOW(), 
                NOW()
            )";
            // return $sql;
            return $this->connection->query($sql);
    }

    public function deleteBoardByID($board_id) {
        $sql = "DELETE FROM `tb_boards` WHERE `tb_boards`.`id` = $board_id;";
            // return $sql;
            return $this->connection->query($sql);
    }

}
