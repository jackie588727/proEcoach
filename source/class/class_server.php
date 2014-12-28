<?php


/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/10
 * Time: 20:12
 */

function getServer($id){


    require("connection.php");

    require("../../core.php");


    $connection = mysql_connect($SQLhost,$SQLuser,$SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb,$connection) or die("Could not select examples");

    $result = mysql_query("SELECT Servers FROM coach WHERE memberID='$id'");

    $row = mysql_fetch_array($result);

    $upper = strtoupper($row['Servers']);

    echo ($upper);

}
