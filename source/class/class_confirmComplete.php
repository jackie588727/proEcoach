<?php ob_start();
/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/27
 * Time: 16:27
 */
if (isset($_GET['id'])) {
    run();
} else {
    header("Location:../");
}


function run()
{

    require("connection.php");
    require("../../core.php");

    $id = $_GET['id'];

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    mysql_query("UPDATE mission SET complete = true,dateComplete = now() WHERE coachID = '$id'");

    if (mysql_affected_rows() > 0) {
        echo("Successful!");
        header("Refresh:3;" . $_URL . "coach/admin_dashboard.php");
    } else {
        echo("Failed!");
        header("Refresh:3;" . $_URL . "coach/admin_dashboard.php");
    }


}




?>