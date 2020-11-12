<?php
namespace app\classes\db;


/**
*   @example new \approot\AppDB("db_master");
*   @example $db_master = \approot\AppDB::use("db_master");
*   @example \app\classes\db\Task_db::insert($db_master, "hello@mail.com");
*/
class Task_db 
{ 

    const TABLE_NAME = 'task';



    /**
    *
    *
    */
    static function insert(\mysqli $db, $email, $user_name, $description){
        $sql = "INSERT INTO " . self::TABLE_NAME . " 
                (email, user_name, description) 
                VALUES 
                (?, ?, ?)";

        $stmt = $db->prepare($sql);

        if(false === $stmt){
            $msg = "Failure prepare query. ";
            $msg .= "errno: (" . $db->errno . ") ";
            $msg .= "error: (" . $db->error . ") ";
            \approot\classes\Logger::sendToLog($msg); 
            return false;
        }

        $bind_param = $stmt->bind_param("sss", $email, $user_name, $description);
        if (false === $bind_param) {
            $msg = "Failure bind param. ";
            $msg .= "errno: " . $stmt->errno . " ";
            $msg .= "error: " . $stmt->error . " ";
            \approot\classes\Logger::sendToLog($msg);
            return false;
        }

        if (false === $stmt->execute()) {
            $msg = "Failure execute query.";
            $msg .= "errno: " . $stmt->errno . " ";
            $msg .= "error: " . $stmt->error . " ";
            \approot\classes\Logger::sendToLog($msg);            
            return false; 
        }

        $stmt->close();
        return true;
    }



    /**
    *
    *
    */
    static function select(
        \mysqli $db, 
        int $number_page, 
        string $sort_property, 
        string $sort_type
    ){

        $sql = 'SELECT * FROM ' . self::TABLE_NAME 
        . ' ORDER BY ' . $sort_property . ' ' . $sort_type 
        . ' LIMIT ' . $number_page . ', 3';

        $result = $db->query($sql);
        if(!$result){
            $msg = 'Failure query. ' . $sql;
            $msg .= 'errno: (' . $db->errno . ') ';
            $msg .= 'error: (' . $db->error . ') ';
            \approot\classes\Logger::sendToLog($msg); 
            return false;
        }

        $arr = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = 
                [
                    "id" => $row['id'], 
                    "email" => $row['email'], 
                    "user_name" => $row['user_name'],
                    "description" => $row['description'],
                    "status" => $row['status'],
                    "status_last_edit" => $row['status_last_edit'],
                ];
            }

            $result->free();
            return $arr;
        }

        $result->free();
        return false;
    }



    /**
    *
    *
    */
    static function selectID(\mysqli $db, int $id){
        $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' WHERE id=? LIMIT 1';

        $stmt = $db->prepare($sql);

        if(false === $stmt){
            $msg = "Failure prepare query. ";
            $msg .= "errno: (" . $db->errno . ") ";
            $msg .= "error: (" . $db->error . ") ";
            \approot\classes\Logger::sendToLog($msg); 
            return false;
        }

        $bind_param = $stmt->bind_param("i", $id);
        if (false === $bind_param) {
            $msg = "Failure bind param. ";
            $msg .= "errno: " . $stmt->errno . " ";
            $msg .= "error: " . $stmt->error . " ";
            \approot\classes\Logger::sendToLog($msg);
            return false;
        }

        if (false === $stmt->execute()) {
            $msg = "Failure execute query.";
            $msg .= "errno: " . $stmt->errno . " ";
            $msg .= "error: " . $stmt->error . " ";
            \approot\classes\Logger::sendToLog($msg);            
            return false; 
        }

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        $result->free();
        return false;
    }



    /**
    *
    *
    */
    static function selectCountRows(\mysqli $db){
        $query = "SELECT COUNT(`id`) FROM " . self::TABLE_NAME;
        $result = $db->query($query);
        
        if ($result->num_rows === 0) {
            return false;
        }

        $row = $result->fetch_assoc();
        $result->free(); 
        return $row["COUNT(`id`)"];
    }



    /**
    *
    *
    */
    static function updateOne(
        \mysqli $db, 
        int $id, 
        string $email, 
        string $user_name, 
        string $description, 
        string $status, 
        string $status_last_edit
    ){

        $sql = "UPDATE " . self::TABLE_NAME . " 
                SET 
                    email=?, 
                    user_name=?, 
                    description=?, 
                    status=?, 
                    status_last_edit=? 
                WHERE 
                    id=? 
                LIMIT 1";

        $stmt = $db->prepare($sql);

        if(false === $stmt){
            $msg = "Failure prepare query. ";
            $msg .= "errno: (" . $db->errno . ") ";
            $msg .= "error: (" . $db->error . ") ";
            \approot\classes\Logger::sendToLog($msg); 
            return false;
        }

        $bind_param = $stmt->bind_param("sssssi",  
            $email, 
            $user_name, 
            $description,
            $status,
            $status_last_edit,
            $id
        );

        if (false === $bind_param) {
            $msg = "Failure bind param. ";
            $msg .= "errno: " . $stmt->errno . " ";
            $msg .= "error: " . $stmt->error . " ";
            \approot\classes\Logger::sendToLog($msg);
            return false;
        }

        if (false === $stmt->execute()) {
            $msg = "Failure execute query.";
            $msg .= "errno: " . $stmt->errno . " ";
            $msg .= "error: " . $stmt->error . " ";
            \approot\classes\Logger::sendToLog($msg);            
            return false; 
        }

        $stmt->close();
        return true;
    }



    /**
    *
    *
    */
    static function updateStatus(\mysqli $db, array $id_arr){
        $status = '1';

        $sql = "UPDATE " . self::TABLE_NAME . " 
                SET 
                    status=?
                WHERE 
                    id=? 
                LIMIT 3";

        $stmt = $db->prepare($sql);

        if(false === $stmt){
            $msg = "Failure prepare query. ";
            $msg .= "errno: (" . $db->errno . ") ";
            $msg .= "error: (" . $db->error . ") ";
            \approot\classes\Logger::sendToLog($msg); 
            return false;
        }

        $bind_param = $stmt->bind_param("si", $status, $id);

        if (false === $bind_param) {
            $msg = "Failure bind param. ";
            $msg .= "errno: " . $stmt->errno . " ";
            $msg .= "error: " . $stmt->error . " ";
            \approot\classes\Logger::sendToLog($msg);
            return false;
        }

        foreach ($id_arr as $key => $id) {
            if (false === $stmt->execute()) {
                $msg = "Failure execute query.";
                $msg .= "errno: " . $stmt->errno . " ";
                $msg .= "error: " . $stmt->error . " ";
                \approot\classes\Logger::sendToLog($msg);            
                return false; 
            }
        }

        $stmt->close();
        return true;
    }

}


