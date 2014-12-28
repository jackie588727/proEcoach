<?php ob_start();
session_start();
/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/23
 * Time: 15:28
 */

if (!isset($_SESSION['loginID']) || $_SESSION['connected'] != TRUE) {
    header("Location:../");
} else {
    run();
}

function run()
{
    require("../../core.php");

    $id = $_SESSION['loginID'];

    if(isset($_POST['roles'])) {
        uploadRoles($id);
    }else{
        echo ("Roles Unchanged.<br>");
    }

    if(isset($_POST['server'])) {
        uploadServer($id);
    }else{
        echo ("Servers Unchanged.<br>");
    }

    if(isset($_POST['lang'])) {
        uploadLanguage($id);
    }else{
        echo ("Language Unchanged.<br>");
    }

    if(isset($_POST['rank'])) {
        uploadRank($id);
    }else{
        echo ("Rank Unchanged.<br>");
    }

    header("Refresh:2;".$_URL."coach/dashboard.php");

}

function uploadRank($id)
{

    require("connection.php");

    $rank = $_POST['rank'];

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    mysql_query("UPDATE coach SET Rank='$rank'WHERE memberID = $id");

    echo($rank . " has been updated!<br>");
}

function uploadRoles($id)
{

    require("connection.php");


    $combine = implode(",", $_POST['roles']);


    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    mysql_query("UPDATE coach SET Roles='$combine'WHERE memberID = $id");

    echo($combine . " has been updated!<br>");
}

function uploadServer($id)
{
    require("connection.php");


    $combine = implode(",", $_POST['server']);


    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    mysql_query("UPDATE coach SET Servers='$combine'WHERE memberID = $id");

    echo($combine . " has been updated!<br>");
}

function uploadLanguage($id)
{
    require("connection.php");


    $combine = implode(",", $_POST['lang']);


    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    mysql_query("UPDATE coach SET Lang ='$combine'WHERE memberID = $id");

    echo($combine . " has been updated!<br>");
}