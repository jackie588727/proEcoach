<?php


function getPriceRaw($id){

    require("connection.php");

    $connection = mysql_connect($SQLhost,$SQLuser,$SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb,$connection) or die("Could not select examples");

    $result = mysql_query("SELECT Price FROM coach WHERE memberID='$id'");

    $row = mysql_fetch_array($result);

    if($row['Price'] == 0){
        return ("N/A");
    }else{
        return $row['Price'];
    }

}

function getPrice($id){

    print (getPriceRaw($id));

}

