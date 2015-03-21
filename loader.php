<?php
/**
 * Created by PhpStorm.
 * User: Ashura
 * Date: 21.03.15
 * Time: 18:19
 */


use formhandler\formhandler;

require("al.php");

$table = $_POST['name'];

$formhandler = new formhandler();

$form = $formhandler->getForm($table);

echo $form;