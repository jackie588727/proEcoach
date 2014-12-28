<?php
/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/13
 * Time: 19:16
 */

function checkLogin($login, $password)
{

    $SQLhost2 = "hqzprogram.db.9124079.hostedresource.com";
    $SQLuser2 = "hqzprogram";
    $SQLpass2 = "Jackie1218!";
    $SQLdb2 = "hqzprogram";

    $connection = mysql_connect($SQLhost2, $SQLuser2, $SQLpass2) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb2, $connection) or die("Could not select database");

    $result = mysql_query("SELECT members_pass_salt,members_pass_hash FROM members WHERE name = '$login' OR email = '$login'");

    $row = mysql_fetch_array($result);

    if ((md5(md5($row['members_pass_salt']) . md5($password))) === $row['members_pass_hash']) {
        return true;
    } else {
        return false;
    }

}

function checkGroup($login)
{
    $SQLhost2 = "hqzprogram.db.9124079.hostedresource.com";
    $SQLuser2 = "hqzprogram";
    $SQLpass2 = "Jackie1218!";
    $SQLdb2 = "hqzprogram";

    $connection = mysql_connect($SQLhost2, $SQLuser2, $SQLpass2) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb2, $connection) or die("Could not select database");

    $result = mysql_query("SELECT member_group_id,members_display_name FROM members WHERE name = '$login'");

    $row = mysql_fetch_array($result);

    if ($row['member_group_id'] == 4) {
        regCoach($login, $row['members_display_name']);
        return true;
    } else {
        return false;
    }
}

function regCoach($login, $displayname)
{
    include("connection.php");
    include("class_coachID.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select database");

    $result = mysql_query("SELECT * FROM coach WHERE name = '$login' ");

    if ($row = mysql_num_rows($result) > 0) {

        mysql_query("UPDATE coach SET DisplayName = '$displayname' WHERE Name = '$login'");

        if (mysql_affected_rows() < 1) {
            print("Display name Fail");
        }
    } else {
        //member table
        mysql_query("INSERT INTO coach (Name,DisplayName) VALUES ('$login','$displayname')");

        if (mysql_affected_rows() < 1) {
            print("Member Insertion Failed");
        } else {
            $memberID = getID($login);
            mysql_query("INSERT INTO information (memberID,createdDate) VALUES ('$memberID',now())");
            if (mysql_affected_rows() < 1) {
                print("Detail Creation Failed");
            }

        }
        //article table

    }
}

?>