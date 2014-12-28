<?php
/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/27
 * Time: 15:51
 */








function currentMission(){

    require("connection.php");

    require("../../core.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    $result = mysql_query("SELECT * FROM mission WHERE complete = 0");

    while($row = mysql_fetch_array($result)){

        echo("<tr>");
        echo("<td>".$row['missionID']."</td>");
        echo("<td>".$row['coachID']."</td>");
        echo("<td>".$row['receiverName']."</td>");
        echo("<td>".$row['coachHours']."</td>");
        echo("<td>".$row['transactionID']."</td>");
        echo("<td>".$row['rateKey']."</td>");
        echo("<td>".$row['date']."</td>");

        if($row['requestComplete'] == 1){
            echo("<td><a href='".$_URL.$_SOURCE.$_CLASS."class_confirmComplete.php?id=".$row['coachID']."' class='btn btn-success btn-sm' role='button'>Confirm</a></td>");
        }else{
            echo("<td><a href='#' class='btn btn-success btn-sm' role='button' disabled='disabled'>Did Not Request</a></td>");
        }
        echo("</tr>");

    }

}


function completedMission(){

    require("connection.php");

    require("../../core.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    $result = mysql_query("SELECT * FROM mission WHERE complete = 1");

    while($row = mysql_fetch_array($result)){

        echo("<tr>");
        echo("<td>".$row['missionID']."</td>");
        echo("<td>".$row['coachID']."</td>");
        echo("<td>".$row['receiverName']."</td>");
        echo("<td>".$row['coachHours']."</td>");
        echo("<td>".$row['transactionID']."</td>");
        echo("<td>".$row['rateKey']."</td>");
        echo("<td>".$row['date']."</td>");
        echo("<td>".$row['dateComplete']."</td>");
        echo("</tr>");


    }

}

function coachCurrentMission($id){

    require("connection.php");

    require("../../core.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    $result = mysql_query("SELECT missionID,coachHours,date,requestComplete FROM mission WHERE coachID = '$id' AND complete = 0");

    while($row = mysql_fetch_array($result)){

        echo("<tr>");
        echo("<td>".$row['missionID']."</td>");
        echo("<td>".$row['coachHours']."</td>");
        echo("<td>".$row['date']."</td>");

        if($row['requestComplete'] == 0){
            echo("<td><a href='".$_URL.$_SOURCE.$_CLASS."class_requestComplete.php?id=".$id."' class='btn btn-success btn-sm' role='button'>Request</a></td>");
        }else{
            echo("<td><a href='#' class='btn btn-success btn-sm' role='button' disabled='disabled'>Requested</a></td>");
        }
        echo("</tr>");

    }

}


function coachCompletedMission($id){

    require("connection.php");

    require("../../core.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    $result = mysql_query("SELECT missionID,coachHours,date,dateComplete,rateKey FROM mission WHERE coachID = '$id' AND complete = 1");

    while($row = mysql_fetch_array($result)){

        echo("<tr>");
        echo("<td>".$row['missionID']."</td>");
        echo("<td>".$row['coachHours']."</td>");
        echo("<td>".$row['date']."</td>");
        echo("<td>".$row['dateComplete']."</td>");
        echo("<td><pre>".$_URL."coach/rate.php?key=".$row['rateKey']."</pre></td>");
        echo("</tr>");


    }



}






?>