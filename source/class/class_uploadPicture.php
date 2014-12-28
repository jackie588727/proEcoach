<?php ob_start(); session_start();

/**
 * Created by PhpStorm.
 * User: jackie
 * Date: 2014-11-25
 * Time: 12:47 PM
 */

if (!isset($_SESSION['loginID']) || $_SESSION['connected'] != TRUE || !isset($_FILES['profilePic'])) {
    header("Location:../");
}else{

$error_collect = array();

runPicture($_SESSION['loginID']);

}

function runPicture($user_id){
    require("../../core.php");
    $pic = $_FILES["profilePic"];
    $temp_name = $_FILES["profilePic"]["tmp_name"];

    $ext = checkFile($pic);    //file check and get extension

    if (empty($error_collect)) {

        checkCurrent($user_id); //delete pic
        upload($user_id, $ext, $temp_name);
        header("Refresh:3;".$_URL."coach/dashboard.php");

    } else {

        foreach ($error_collect as $e) {
            echo($e . "<br>");
        }

        header("Refresh:3;".$_URL."coach/dashboard.php");
    }
}


function upload($id,$ext,$temp_name){


    require("connection.php");
    $mysqli = new mysqli($SQLhost, $SQLuser, $SQLpass, $SQLdb);

    if(move_uploaded_file($temp_name,"../profilePic/".$id.".".$ext)){

        $stmt = $mysqli->prepare("UPDATE coach SET Picture = ? WHERE memberID = ?");
        $stmt->bind_param('si',$ext,$id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->affected_rows > 0) {
            print ("Successful!");
        }else{
            print ("Fail to update!");
        }

    }else{

        print ("Fail move file!");
    }


}

function checkFile($pic){

    $type = $pic['type'];
    $size = $pic['size'];

    $ext = checkExt($type,$pic);   //get extension
    checkSize($size);   //check for size limit

    return $ext;
}

function checkExt($type,$file){
    global $error_collect;

    if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png" || $type == "image/gif" ){

        $exp = explode(".",$file['name']);
        $ext = end($exp);
        return $ext;
    } else {

        $error_collect[] = "File extensions not allowed";

    }



}

function checkSize($size){
    global $error_collect;

    if($size > 5000000){
        $error_collect[] = "File bigger than 5MB limit, please try again!";
    }


}

function checkCurrent($id){
    include("connection.php");

    $mysqli = new mysqli($SQLhost, $SQLuser, $SQLpass, $SQLdb);

    $stmt = $mysqli->prepare("SELECT Picture FROM coach WHERE memberID = ?");
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $stmt->bind_result($extension);
    $stmt->fetch();
    $stmt->close();
    if($extension != NULL){
        unlink("../profilePic/".$id.".".$extension);

        $ext = NULL;
        $stmt = $mysqli->prepare("UPDATE coach SET Picture = ? WHERE memberID = ?");
        $stmt->bind_param('si',$ext,$id);
        $stmt->execute();


    }

}


?>