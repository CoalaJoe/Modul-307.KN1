<?php
/**
 * Created by PhpStorm.
 * User: Ashura
 * Date: 21.03.15
 * Time: 18:18
 */

namespace formhandler;
use Manager\databasemanger;

/**
 * Class formhandler for handling userinteraction and delivering data.
 * @package formhandler
 */
class formhandler {

    /**
     * @var databasemanger databasemanager
     */
    private $databasemanager;

    /**
     * Constructor
     */
    public function __construct(){
        $this->databasemanager = new databasemanger();
    }

    /**
     * Get collumns from table
     * @param $tablename
     * @return array|bool
     */
    public function getCollumnsForTable($tablename){
        $query = "DESCRIBE " . $tablename;
        if ($result = mysqli_query($this->databasemanager->connect(), $query)){
            $data = [];
            while($row = mysqli_fetch_row($result)){
                $tmpData['Field'] = $row[0];
                $tmpData['Type'] = $row[1];
                $tmpData['Null'] = $row[2];
                $tmpData['Key'] = $row[3];
                $tmpData['Default'] = $row[4];
                $tmpData['Extra'] = $row[5];
                array_push($data, $tmpData);
            }
            return $data;
        } else{
            return false;
        }
    }

    /**
     * Parses array to html form
     * @param $collumns
     * @return mixed
     */
    public function parseCollumnsForForm($collumns){
        $content = [];
        foreach($collumns as $collumn){
            $attr = [];
            if ($collumn['Extra'] == "auto_increment"){

            } else{
                if (isset($collumn['Default'])){
                    array_push($attr, ["placeholder" => $collumn['Default']]);
                }

                if ($collumn['Null'] == "NO"){
                    array_push($attr, ["isNull" => false]);
                } else{
                    array_push($attr, ["isNull" => true]);
                }

                array_push($attr, ["name" => $collumn['Field']]);

                array_push($attr, ["type" => $this->typeParser($collumn['Type'])]);

            }

            array_push($content, $attr);
        }
        // $form = "<form method='POST' action=''></form>";
        // $form = $collumns;
        return $content;
    }


    /**
     * Converts databsetypes in forminputtypes
     * @param $type
     * @return string
     */
    public function typeParser($type){
        switch ($type){
            case (preg_match('/^bigint/', $type) ? true : false) :
            case (preg_match('/^mediumint/', $type) ? true : false) :
            case (preg_match('/^smallint/', $type) ? true : false) :
            case (preg_match('/^int/', $type) ? true : false) :
                return "number";
                break;
            case (preg_match('/^longtext/', $type) ? true : false) :
            case (preg_match('/^mediumtext/', $type) ? true : false) :
            case (preg_match('/^text/', $type) ? true : false) :
                return "textarea";
                break;
            case (preg_match('/^varchar/', $type) ? true : false) :
            case (preg_match('/^char/', $type) ? true : false) :
                return "text";
                break;
            case (preg_match('/^float/', $type) ? true : false) :
            case (preg_match('/^double/', $type) ? true : false) :
                return "number;anyStep";
                break;
            case (preg_match('/^datetime/', $type) ? true : false) :
                return "datetime-local";
                break;
            case (preg_match('/^time/', $type) ? true : false) :
                return "time";
                break;
            case (preg_match('/^date/', $type) ? true : false) :
                return "date";
                break;
            default: break;
        }
    }

    /**
     * Builds actual form from array
     * @param $array
     * @return string
     */
    public function formBuild($array){
        $content = "";
        foreach($array as $input){
            if (isset($input[0])){
                if (!$input[0]['isNull']){
                    $needed = "required";
                    $symbol = "<span class='required'>*</span>";
                } else {
                    $needed = "";
                    $symbol = "";
                }

                if (strpos($input[2]['type'], ";") !== false){
                    $type = "type='number' step='any' ";
                } else{
                    $type = "type='". $input[2]['type'] ."' ";
                }


                $content .= "<label for='" . $input[1]['name'] . "'>" . $input[1]['name'] . " : " . $symbol . "</label><input name='" . $input[1]['name'] . "'  " . $type . $needed .  " /><br/>";
            }

        }

        $form = "<form method='POST' action=''>" . $content . "<input type='submit' class='btn btn-success' /></form>";
        return $form;
    }

    /**
     * Delivers form from table name
     * @param $tablename
     * @return mixed
     */
    public function getForm($tablename){
        $collumns = $this->getCollumnsForTable($tablename);
        $formArray = $this->parseCollumnsForForm($collumns);
        $form = $this->formBuild($formArray);
        return $form;
    }

}