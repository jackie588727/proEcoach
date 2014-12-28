<?php


/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/10
 * Time: 20:12
 */


function getRoles($id)
{

    require("connection.php");

    require("../../core.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    $result = mysql_query("SELECT Roles FROM coach WHERE memberID = $id");

    $row = mysql_fetch_array($result);

    $role = explode(",", $row['Roles']);

    foreach ($role as $r) {

        print("<img src='$_URL$_IMG$r.png' alt = '$r' width='32' height='32'/>");

    }

}
