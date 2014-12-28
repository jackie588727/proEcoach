<?php
/**
 * Created by PhpStorm.
 * User: 997804939
 * Date: 2014/12/24
 * Time: 14:22
 */

function displayCoach()
{

    require("connection.php");
    require("class_picture.php");
    require("class_rating.php");
    require("class_rank.php");
    require("class_price.php");

    $connection = mysql_connect($SQLhost, $SQLuser, $SQLpass) or die ('Could not connect: ' . mysql_error());

    $selectDB = mysql_select_db($SQLdb, $connection) or die("Could not select examples");

    $result = mysql_query("SELECT * FROM coach WHERE disable = '0'");

    $count = 0;
    while ($row = mysql_fetch_array($result)) {
        $memberID = $row['memberID'];
        $displayName = $row['DisplayName'];
        $price = getPriceRaw($memberID);

        if ($count == 0) {
            echo("<div class='row'>". "\xA");
        }
        echo("<!--                             Profile                 -->". "\xA");
        echo("<div class='col-sm-3 col-md-3 col-lg-3'>". "\xA");
        echo("<div class='col-sm-8 col-md-8 col-lg-8'>". "\xA");
        echo("<h3>$displayName</h3>". "\xA");
        echo("</div>");
        echo("<div class='col-sm-4 col-md-4 col-lg-4'>". "\xA");
        getRank($memberID);
        echo("</div>". "\xA");
        echo("<div class='thumbnail'>". "\xA");
        echo("<a href='detail.php?pec=$memberID' class='thumbnail'>". "\xA");
        getProfile($memberID);
        echo("</a>". "\xA");
        echo("<div class='caption'>". "\xA");
        getRating($memberID);
        echo("<p>HELLO world</p>". "\xA");
        echo("<p><a href='#' class='btn btn-primary' role='button'>$ $price / Hour - Buy</a> <a class='btn btn-default' role='button' href='detail.php?pec=$memberID'>Detail</a></p>". "\xA");
        echo("</div>". "\xA");
        echo("</div>". "\xA");
        echo("</div>". "\xA");

        if ($count == 4) {
            echo("</div>". "\xA");
            $count = 0;
        }
        $count++;

    }

}