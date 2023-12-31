<?php
    require_once(__DIR__.'/BaseModel.php');
    class UserModel extends BaseModel
    {
        public $connection;

        public function __construct() {
            $this->connection = BaseModel::Connect();
        }

        public function getUserLoginBy($username, $password) {
            $sql = "SELECT * FROM tb_admins WHERE username = '".$username."' AND password = '".$password."'";
            $res = $this->connection->query($sql);
            $data = [];
            if($res->num_rows > 0){
                while ($row = $res->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        public function getUserByID($id) {
            $sql = "SELECT * FROM tb_users WHERE user_id = $id";
            $res = $this->connection->query($sql);
            $data = [];
            if($res->num_rows > 0){
                while ($row = $res->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        public function getUsersBy($keyword = "") {
            $connection = ($keyword != "") 
            ? " AND tb_users.user_prefix LIKE '%$keyword%' OR tb_users.user_name LIKE '%$keyword%' OR tb_users.user_lastname LIKE '%$keyword%'" 
            : "";
            $sql = "SELECT tb_users.*, COALESCE(tb_user_banned_list.user_id, false) AS user_banned FROM tb_users 
            LEFT JOIN tb_user_banned_list ON tb_user_banned_list.user_id = tb_users.user_id
            WHERE TRUE".$connection;
            $res = $this->connection->query($sql);
            $data = [];
            if($res->num_rows > 0){
                while ($row = $res->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        public function getUserRating(){
            $sql = "SELECT * FROM `tb_rating`";
            $res = $this->connection->query($sql);
            $data = [];
            if($res->num_rows > 0){
                while ($row = $res->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        public function getUserByCard($card = "") {
            $sql = "SELECT * FROM tb_users WHERE user_national_card = '".$card."'";
            $res = $this->connection->query($sql);
            $data = [];
            if($res->num_rows > 0){
                while ($row = $res->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        public function updateUserByID($user_prefix, $user_name, $user_lastname, $user_gender, $user_national_card, $user_birthday, $user_id) {
            $sql = "
                UPDATE `tb_users` SET 
                `user_prefix` = '$user_prefix', 
                `user_name` = '$user_name', 
                `user_lastname` = '$user_lastname', 
                `user_gender` = '$user_gender', 
                `user_national_card` = '$user_national_card', 
                `user_birthday` = '$user_birthday' 
                WHERE `tb_users`.`user_id` = $user_id
            ";
            // return $sql;
            return $this->connection->query($sql);
        }

        public function insertUserBy($user_prefix, $user_name, $user_lastname, $user_national_card, $user_birthday) {
            $sql = "
                INSERT INTO `tb_users` (
                    `user_id`, 
                    `user_prefix`, 
                    `user_name`, 
                    `user_lastname`, 
                    `user_national_card`, 
                    `user_birthday`, 
                    `user_role`, 
                    `add_date`, 
                    `update_date`
                    ) VALUES (
                        NULL, 
                        '$user_prefix', 
                        '$user_name', 
                        '$user_lastname', 
                        '$user_national_card', 
                        '$user_birthday', 
                        'user', 
                        NOW(), 
                        NOW()
                    )
            ";
            // return $sql;
            $this->connection->query($sql);
            return $this->getUserByCard($user_national_card);
        }

        public function updateRoleUserByID($user_id, $user_role) {
            $sql = "
                UPDATE `tb_users` SET 
                `user_role` = '$user_role' 
                WHERE `tb_users`.`user_id` = $user_id
            ";
            // return $sql;
            return $this->connection->query($sql);
        }
        
        public function deleteUserByID($user_id) {
            $sql = "DELETE FROM tb_users WHERE `tb_users`.`user_id` = $user_id";
            return $this->connection->query($sql);
        }

        public function insertBannedUserByID($user_id) {
            $sql = "INSERT INTO `tb_user_banned_list` (`id`, `user_id`) VALUES (NULL, '$user_id')";
            return $this->connection->query($sql);
        }

        public function deleteBannedUserByID($user_id) {
            $sql = "DELETE FROM tb_user_banned_list WHERE `tb_user_banned_list`.`user_id` = $user_id";
            return $this->connection->query($sql);
        }

    }
    