<?php
/**
 * Created by PhpStorm.
 * User: Ashura
 * Date: 21.03.15
 * Time: 18:19
 */


use formhandler\formhandler;

require("al.php");

// Name of button that was pressed
$table = $_POST['name'];

// Instance of formhandler
$formhandler = new formhandler();

// Get form by POST name
$form = $formhandler->getForm($table);

echo $form;