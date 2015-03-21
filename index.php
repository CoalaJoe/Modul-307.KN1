<?php
/**
 * Created by PhpStorm.
 * User: Ashura
 * Date: 11.03.15
 * Time: 13:42
 */

use Manager\databasemanger;

require("al.php");

$databsemanager = new databasemanger();

?>

<!DOCTYPE html>
<html>
<head lang="de">
    <meta charset="UTF-8">
    <title>Formularformular</title>
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/style.css">
</head>
<body>
<main>
    <div id="container">
        <div id="content">
            <h1>Formualare</h1>
            <hr/>
            <p>
                Herzlich Willkommen zu meinem ersten KN zum Modul 307. Bitte wählen Sie ein Formular aus um es anzuzeigen oder zu füllen.
            </p>
            <div id="tables-list">
                <?php
                    // List all Tables as Links
                    $tables = $databsemanager->getTables();
                    foreach($tables as $tablename){?>
                        <a href="#"><button class="btn btn-form"><?php echo $tablename['name']; ?></button></a>
                    <?php
                    }
                ?>
            </div>
            <div id="rendered-form">
                Noch kein Formular ausgewählt.
            </div>
        </div>
    </div>
</main>
<footer>
    Schüler: Dominik Müller <br/>
    Klasse: IGE 13B <br/>
    Modul: 307 <br/>
    Kontakt: <a href="mailto:dominik.mueller@gibmit.ch">dominik.mueller@gibmit.ch</a>
</footer>
<script src="web/js/jquery.min.js"></script>
<script src="web/js/bootstrap.min.js"></script>
<script src="web/js/app.js"></script>
</body>
</html>