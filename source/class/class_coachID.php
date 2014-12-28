<?php
/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/14
 * Time: 16:57
 */

function getID($login){
    include("connection.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select database");

    $result = mysql_query("SELECT memberID FROM coach WHERE name = '$login' ");

    $row = mysql_fetch_array($result);
    if (mysql_num_rows($result) > 0) {
        return $row['memberID'];
    } else {
        print("ERROR: Can not get ID.");
    }


}

function getName($id){
    include("connection.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select database");

    $result = mysql_query("SELECT DisplayName FROM coach WHERE memberID = '$id' ");

    $row = mysql_fetch_array($result);
    if (mysql_num_rows($result) > 0) {
        return $row['DisplayName'];
    } else {
        print("Can not get DisplayName.");
    }
}