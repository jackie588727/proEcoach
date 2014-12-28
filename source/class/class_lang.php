<?php



/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/10
 * Time: 20:12
 */


function getLang($id)
{
    require("connection.php");

    require("../../core.php");

    $flag = "flag/";

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    $result = mysql_query("SELECT Lang FROM coach WHERE memberID='$id'");

    $row = mysql_fetch_array($result);

    $lang = explode(",", $row['Lang']);

    foreach ($lang as $l) {

        print("<span style='margin-right:3px'></span><img src='$_URL$_IMG$flag$l.png' alt = '$l'' /></span>");

    }

}
