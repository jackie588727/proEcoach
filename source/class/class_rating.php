<?php

/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/10
 * Time: 20:12
 */


function getRating($id)
{

    $rate = "rate/";
    $rating = null;

    require("connection.php");

    require("../../core.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    $result = mysql_query("SELECT Rating FROM coach WHERE memberID='$id'");

    $row = mysql_fetch_array($result);

    switch (true) {
        case ($row['Rating'] <= 0.99):
            $rating = 0;
            break;
        case ($row['Rating'] >= 1 && $row['Rating'] <= 1.99):
            $rating = 1;
            break;
        case ($row['Rating'] >= 2 && $row['Rating'] <= 2.99):
            $rating = 2;
            break;
        case ($row['Rating'] >= 3 && $row['Rating'] <= 3.99):
            $rating = 3;
            break;
        case ($row['Rating'] >= 4 && $row['Rating'] <= 4.99):
            $rating = 4;
            break;
        case ($row['Rating'] >= 5 && $row['Rating'] <= 5.99):
            $rating = 5;
            break;
        case ($row['Rating'] >= 6 && $row['Rating'] <= 6.99):
            $rating = 6;
            break;
        case ($row['Rating'] >= 7 && $row['Rating'] <= 7.99):
            $rating = 7;
            break;
        case ($row['Rating'] >= 8 && $row['Rating'] <= 8.99):
            $rating = 8;
            break;
        case ($row['Rating'] >= 9 && $row['Rating'] <= 10):
            $rating = 9;
            break;
        default:
            $rating = 0;
    }

    print("<img src='$_URL$_IMG$rate$rating.png' alt = '$rating' width='128' height='24'/>");

}

