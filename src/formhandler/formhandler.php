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
                    $attr["placeholder"] = $collumn['Default'];
                }

                if ($collumn['Null'] == "NO"){
                    $attr["isNull"] = false;
                } else{
                    $attr["isNull"] = true;
                }

                $attr["name"] = $collumn['Field'];

                $attr["type"] = $this->typeParser($collumn['Type']);

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
            case ($type === "password"):
                return "password";
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

        // Final HTML Output
        $content = "";

        $dropdowns = [];

        // Variable for collum input
        $latestLabelName = "";
        $labelNeeded = "";
        foreach($array as $input){
            if (isset($input['isNull'])){
                $prefix = substr($input['name'], 0 , strpos($input['name'], "_"));
                if (!$input['isNull']){
                    $needed = "required";
                    $symbol = "<span class='required'>*</span>";
                    if ($prefix === 'l'){
                        $labelNeeded = $needed;
                        $latestSymbol = $symbol;
                    }
                } else {
                    $needed = "";
                    $symbol = "";
                }



                if ($prefix === "l"){
                    $name = substr($input['name'], strpos($input['name'], "_") + 1);
                    $latestLabelName = $input['name'];
                    $content .= "    <label for='". $latestLabelName ."'> ". $name .": ". $symbol ."</label> \n";

                } else if($prefix === "dda") {
                    $name = substr($input['name'], strpos($input['name'], "_") + 1);
                    $content .= "    <select name='". $latestLabelName ."' ". $labelNeeded ."  >\n        <option>". $name ."</option>\n";
                } else if($prefix === "dd"){
                    $name = substr($input['name'], strpos($input['name'], "_") + 1);
                    $content .= "        <option>". $name ."</option>\n";
                }else if($prefix === "dde"){
                    $name = substr($input['name'], strpos($input['name'], "_") + 1);
                    $content .= "        <option>". $name ."</option> \n    </select>\n    <br/>\n";
                }else if($prefix === "radio"){
                    $name = substr($input['name'], strpos($input['name'], "_") + 1);
                    $content .= "    <span class='radioBlock'>\n        <input type='radio' name='". $latestLabelName ."' ". $labelNeeded ." value='". $name ."' id='". $name ."' />\n        <label class='radio' for='". $name ."'> " . $name . "</label>\n    </span>\n    <br/>\n";
                }else if($prefix === "check"){
                    $name = substr($input['name'], strpos($input['name'], "_") + 1);
                    $content .= "    <span class='checkboxBlock'>\n        <input type='checkbox' name='". $latestLabelName ."' ". $labelNeeded . " value='".  $name ."' id='". $name ."' />\n        <label class='checkbox' for='". $name . "'>". $name ."</label>\n    </span>\n    <br/>\n";
                } else{

                    if ($prefix === "pw"){
                        $type = "type='password'";
                    }

                    if (strpos($input['type'], ";") !== false){
                        $type = "type='number' step='any' ";
                    } else if (strpos($input['type'], "area") !== false) {
                        $type = "";
                    }
                    else{
                        $type = "type='". $input['type'] ."' ";
                    }

                    if (strpos($input['type'], "area")){
                        $field = "    <textarea  name='" . $input['name'] . "' id='" . $input['name'] . "'" . $needed . "></textarea>\n";
                    } else{
                        $field = "    <input name='" . $input['name'] . "' id='" . $input['name'] . "'  " . $type . $needed .  " />\n";
                    }

                    $content .= "    <label for='" . $input['name'] . "'>" . $input['name'] . " : " . $symbol . "</label>\n" . $field . "    <br/>\n";

                }






            }

        }

        $form = "<form method='POST' action=''>\n" . $content . "    <input type='submit' class='btn btn-success submit-button' />\n</form>";
        return $form;
    }


    /**
     * @param $cols
     * @return mixed
     */
    private function fetchPw($cols){
        // Index for changing the outer array
        $index=0;
        foreach($cols as $col){

            $prefix = substr($col['Field'], 0 , strpos($col['Field'], "_"));
            if ($prefix === "pw"){
                $name = substr($col['Field'], strpos($col['Field'], "_") + 1);
                $cols[$index]['Type'] = "password";
                $cols[$index]['Field'] = $name;
            }
            $index++;
        }
        return $cols;
    }


    /**
     * Delivers form from table name
     * @param $tablename
     * @return mixed
     */
    public function getForm($tablename){
        // Get all collumns and their attributes in table
        $collumns = $this->getCollumnsForTable($tablename);

        $fetchedCols = $this->fetchPw($collumns);

        // Filters usefull information
        $formArray = $this->parseCollumnsForForm($fetchedCols);

        $form = $this->formBuild($formArray);
        return $form;
    }


}