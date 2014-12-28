<?php
/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/25
 * Time: 18:47
 */

function checkDisable($id){

require("connection.php");

$connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

$selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

$result = mysql_query("SELECT disable FROM coach WHERE memberID = '$id'");

$row = mysql_fetch_array($result);

return $row['disable'];

}