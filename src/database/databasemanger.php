<?php
/**
 * Created by PhpStorm.
 * User: Ashura
 * Date: 11.03.15
 * Time: 14:06
 */

namespace Manager;

/**
 * Class databasemanger for handling database requests
 * @package Manager
 */
class databasemanger {


    /**
     * Establishes a Databaseconnection.
     * @return bool|\mysqli
     */
    public function connect(){
        $db = mysqli_connect("127.0.0.1", 'root', 'root', 'KN1');
        $db->set_charset("utf8");
        if ($db->connect_errno > 0){
            return false;
        } else{
            return $db;
        }
    }

    /**
     * Get Tablenames for displaying buttons.
     * @return array|bool
     */
    public function getTables(){
        $query = 'SHOW Tables';
        if ($result = mysqli_query($this->connect(), $query)){
            $data = [];
            while($row = mysqli_fetch_row($result)){
                $tmpData['name'] = $row[0];
                array_push($data, $tmpData);
            }
            return $data;
        } else{
            return false;
        }
    }

    public function __construct(){
        $query = "CREATE DATABASE IF NOT EXISTS KN1";
        mysqli_query(mysqli_connect("127.0.0.1", "root", "root"), $query);
    }


}