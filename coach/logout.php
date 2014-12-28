<?php session_start();ob_start();

/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/15
 * Time: 17:42
 */

if (!isset($_SESSION['loginID']) || $_SESSION['connected'] != TRUE) {
    header("Location:../");
}else{
    unset($_SESSION['loginID']);
    unset($_SESSION['connected']);
    print("Logged Out!");
    header("Refresh:3;../");
}

