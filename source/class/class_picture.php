<?php



/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/10
 * Time: 20:12
 */



function getProfile($id)
{
    $ext = checkPicture($id);
    if ($ext != NULL) {
        printPicture($id, $ext);
    } else {
        print("<img src='http://wp.jackiehuang.ca/test/source/profilePic/logo.png' width='200' height='200' />");
    }


}

function checkPicture($id)
{

    require("connection.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    $result = mysql_query("SELECT Picture FROM coach WHERE memberID='$id'");

    $row = mysql_fetch_array($result);

    return $row['Picture'];
}

function printPicture($id, $ext)
{

    print("<img src='http://wp.jackiehuang.ca/test/source/profilePic/$id" . ".$ext' class='img-thumbnail img-responsive' />");

}