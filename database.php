<?php
    require_once('./config.php');

    class DatabaseTranscations extends PDOStatement {
        private $connection;

        public function __construct()
        {
        }

        private function connection() {
            $connection = new PDOConfig();
            if($connection === false){
                echo "ERROR: Could not connect. " . mysqli_connect_error();
            }
            return $connection;
        }

        
//user query
        public function insert($name,$username,$email,$phone,$password) {
            $sql = "INSERT INTO users(name,username,email,phone,password) VALUES (?, ?, ?, ?, ?)";
        try {
            $connection = $this->connection();
            $statement = $connection->prepare($sql);

            $statement->bindParam(1, $name, PDO::PARAM_STR);
            $statement->bindParam(2, $username, PDO::PARAM_STR);
            $statement->bindParam(3, $email, PDO::PARAM_STR);
            $statement->bindParam(4, $phone, PDO::PARAM_STR);
            $statement->bindParam(5, $password, PDO::PARAM_STR);

            $statement->execute();
            $connection = null;
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        }

        public function select($id = null) {
            if (isset($id)) {
                $sql = "SELECT * FROM users WHERE id = :id";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                $connection = null;
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            } else {
                $sql =  "SELECT * FROM users";
                try {
                    $connection = $this->connection();
                    $statement = $connection->query($sql);
                    $result = $statement->fetchAll();
                    $connection = null;
                    return $result;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }
        }

        public function update($name,$email,$phone,$password,$id) {
            $sql = "UPDATE users set name = ?, email = ?, phone = ?, password = ? WHERE id = ?";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->bindParam(1, $name, PDO::PARAM_STR);
                $statement->bindParam(2, $email, PDO::PARAM_STR);
                $statement->bindParam(3, $phone, PDO::PARAM_STR);
                $statement->bindParam(4, $password, PDO::PARAM_STR);
                $statement->bindParam(5, $id, PDO::PARAM_INT);
                $statement->execute();
                $connection = null;
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
        }
        }
        public function disableToggle($active,$id) {
            $sql = "UPDATE users set active = ? WHERE id = ?";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->bindParam(1, $active, PDO::PARAM_STR);
                $statement->bindParam(2, $id, PDO::PARAM_INT);
                $statement->execute();
                $connection = null;
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
        }
        }

        public function delete($id) {
            $sql = "DELETE FROM users WHERE id = ?";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->bindParam(1, $id, PDO::PARAM_INT);
                $statement->execute();
                $connection = null;
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
// feedback related queries
        public function insertFeed($title, $comment,$type,$file) {
            $sql = "INSERT INTO feedback(title, comment,type,file) VALUES (?, ?, ?, ?)";
        try {
            $connection = $this->connection();
            $statement = $connection->prepare($sql);

            $statement->bindParam(1, $title, PDO::PARAM_STR);
            $statement->bindParam(2, $comment, PDO::PARAM_STR);
            $statement->bindParam(3, $type, PDO::PARAM_STR);
            $statement->bindParam(4, $file, PDO::PARAM_STR);

            $statement->execute();
            $connection = null;
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        }

        public function selectFeed($id = null) {
            if (isset($id)) {
                $sql = "SELECT * FROM feedback WHERE id = :id";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                $connection = null;
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            } else {
                $sql =  "SELECT * FROM feedback";
                try {
                    $connection = $this->connection();
                    $statement = $connection->query($sql);
                    $result = $statement->fetchAll();
                    $connection = null;
                    return $result;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }
        }

        public function updateFeed($title, $comment,$type,$file, $id) {
            $sql = "UPDATE feedback set title = ?, comment = ?, type = ?, file = ? WHERE id = ?";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->bindParam(1, $title, PDO::PARAM_STR);
                $statement->bindParam(2, $comment, PDO::PARAM_STR);
                $statement->bindParam(3, $type, PDO::PARAM_STR);
                $statement->bindParam(4, $file, PDO::PARAM_STR);
                $statement->bindParam(5, $id, PDO::PARAM_INT);
                $statement->execute();
                $connection = null;
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
        }
        }

        public function deleteFeed($id) {
            $sql = "DELETE FROM feedback WHERE id = ?";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->bindParam(1, $id, PDO::PARAM_INT);
                $statement->execute();
                $connection = null;
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }