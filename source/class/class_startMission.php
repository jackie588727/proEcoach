<?php ob_start();
session_start();
/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/27
 * Time: 15:26
 */

if (isset($_SESSION['admin_connected']) && $_SESSION['admin_connected'] == TRUE) {
    run();
} else {
    header("Location:../");
}


function run()
{


    $coachID = $_POST['coachID'];
    $hours = $_POST['hours'];
    $tranID = $_POST['tranID'];
    $receiver = $_POST['receiver'];
    $rateKey = generateRandomString();

    require("connection.php");
    require("../../core.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    mysql_query("INSERT INTO mission (coachID,coachHours,receiverName,transactionID,rateKey,date) VALUES  ('$coachID','$hours','$receiver','$tranID','$rateKey',now())");

    if (mysql_affected_rows() < 1) {
        print("Failed to start Mission!");
        header("Refresh:3;" . $_URL . "coach/admin_dashboard.php");
    }else{
        print("Successful!");
        header("Refresh:3;" . $_URL . "coach/admin_dashboard.php");
    }


}


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}