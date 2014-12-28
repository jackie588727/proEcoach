<?php ob_start();
session_start();

include_once('../core.php');

if (!isset($_GET['pec'])) {
    header("Location:index.php");
}

require($_ROOT . $_SOURCE . $_CLASS . "class_desc.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_coachID.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_picture.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_rank.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_rating.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_roles.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_lang.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_server.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_price.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_disable.php");

$coachID = $_GET['pec'];

if(checkDisable($coachID) == 1) {
    header("Location:index.php");
}



?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $_DESC; ?>">
    <meta name="keywords" content="<?php echo $_KEYWORDS; ?>">
    <link rel="stylesheet" href="<?php echo $_URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_URL . $_SOURCE; ?>core.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?php echo $_URL; ?>js/ckeditor/ckeditor.js"></script>

    <link rel="stylesheet" href="css/detail.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
    <title><?php echo(getName($coachID)); ?> | Pro E Coach</title>
</head>
<body>
<?php include($_ROOT . $_SOURCE . "header.php"); ?>

<div class="container-fluid">
    <div class="intro">
        <div class="row">
            <div class="col-sm-2 ">
                <?php echo("<h1 id='nametag'>" . getName($coachID) . "</h1>"); ?>
            </div>
            <div class="col-sm-2 col-sm-offset-2">
                <div id="profilePic">
                    <?php getProfile($coachID); ?>
                </div>
            </div>
            <div class="col-sm-2 col-sm-offset-2">
                <?php
                $rank = getRankRaw($coachID);
                $rankimg = "rank/";
                print("<img src='$_URL$_IMG$rankimg$rank.png' alt = '$rank' width='128' height='128'/>");
                ?>
                <h4 style='color:#5cb85c'><?php print ($rank); ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-default panel-transparent">
                    <div class="panel-heading"><h5>Coach Rating</h5></div>
                    <div class="panel-body">
                        <?php getRating($coachID); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-default panel-transparent">
                    <div class="panel-heading"><h5>Roles / Positions</h5></div>
                    <div class="panel-body">
                        <?php getRoles($coachID); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-sm-offset-1">
                <div class="panel panel-default panel-transparent">
                    <div class="panel-heading"><h5>Languages</h5></div>
                    <div class="panel-body">
                        <?php getLang($coachID); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-sm-offset-2">
                <button type="button" class="btn btn-success btn-lg">$ <?php getPrice($coachID); ?> / Hour - Buy Now
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="margin"></div>

    <div class="row">

        <div class="col-sm-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Coach's Words</h3>
                </div>
                <div class="panel-body">
                    <div class="desc">
                        <?php printDesc($coachID); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">

            <div class="comment">
                Comment HHHHHHHHHHHHHHHHERE
            </div>

        </div>
    </div>






    <?php include($_ROOT . $_SOURCE . "footer.php"); ?>
</body>
</html>