<?php ob_start(); session_start();

/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/10
 * Time: 20:12
 */


if (!isset($_SESSION['loginID']) || $_SESSION['connected'] != TRUE) {
    header("Location:../");
}else{
    uploadDesc($_SESSION['loginID']);
}


function uploadDesc($id){

    require("connection.php");
    require("../../core.php");

    $desc = $_POST['desc'];

    $connection = mysql_connect($SQLhost,$SQLuser,$SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb,$connection) or die("Could not select examples");

    mysql_query("UPDATE information SET detail='$desc',createdDate = now() WHERE memberID = $id");

    if(mysql_affected_rows() < 1){
        print("Failed!");
        header("Refresh:3;".$_URL."coach/dashboard.php");
    }else{
        print ("Successful!");
        header("Refresh:2;".$_URL."coach/dashboard.php");
    }

}

