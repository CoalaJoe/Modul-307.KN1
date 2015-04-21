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
     * @var string IP of the Database
     */
    private $ip = "127.0.0.1";

    /**
     * @var string Username to connect to the database
     */
    private $username = "root";

    /**
     * @var string Password for the user
     */
    private $password = "root";

    /**
     * @var string Name of the database
     */
    private $database = "KN1";

    /**
     * PHP-Constructor
     */
    public function __construct(){
        $query = "CREATE DATABASE IF NOT EXISTS `". $this->database. "`";
        mysqli_query(mysqli_connect($this->ip, $this->username, $this->password), $query);
    }

    /**
     * Get table names for displaying buttons.
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

    /**
     * Establishes a database connection.
     * @return bool|\mysqli
     */
    public function connect(){
        $db = mysqli_connect($this->ip, $this->username, $this->password, $this->database);
        $db->set_charset("utf8");
        if ($db->connect_errno > 0){
            return false;
        } else{
            return $db;
        }
    }


}