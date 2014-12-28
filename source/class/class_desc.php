<?php


/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/10
 * Time: 20:12
 */


function printDesc($id){

    require("connection.php");

    $connection = mysql_connect($SQLhost,$SQLuser,$SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb,$connection) or die("Could not select examples");

    $result = mysql_query("SELECT detail FROM information WHERE memberID = $id");

    $row = mysql_fetch_array($result);

    print($row['detail']);

}