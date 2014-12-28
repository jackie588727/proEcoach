<?php
/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/10
 * Time: 20:36
 */


function getRankRaw($id)
{

    require("connection.php");

    require("../../core.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    $result = mysql_query("SELECT Rank FROM coach WHERE memberID = $id");

    $row = mysql_fetch_array($result);

    return $rank = $row['Rank'];

}

function getRank($id)
{
    require("../../core.php");

    $rank = getRankRaw($id);

    $rankimg = "rank/";

    print("<img src='$_URL$_IMG$rankimg$rank.png' alt = '$rank' width='64' height='64'/>");


}
