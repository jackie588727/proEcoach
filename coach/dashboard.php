<?php ob_start();
session_start();
include_once('../core.php');


if (!isset($_SESSION['loginID']) || $_SESSION['connected'] != TRUE) {
    header("Refresh:3;../");
}

require($_ROOT . $_SOURCE . $_CLASS . "class_picture.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_coachID.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_rating.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_desc.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_roles.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_server.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_lang.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_rank.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_price.php");
require($_ROOT . $_SOURCE . $_CLASS . "class_mission.php");

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

    <link rel="stylesheet" href="css/dashboard.css">
    <title>Coaches DashBoard | Pro E Coach</title>
</head>
<body>
<?php include($_ROOT . $_SOURCE . "header.php"); ?>

<div class="coachpanel">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10"><a href="#" class="btn btn-primary btn-lg btn-block disabled"
                                      role="button">Welcome <?php echo getName($_SESSION['loginID']); ?></a></div>
            <div class="col-md-2">
                <form action="logout.php">
                    <button type="submit" class="btn btn-danger">Log Out</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="profilePic">
                    <div class='thumbnail'>
                        <?php getProfile($_SESSION['loginID']); ?>
                    </div>
                    <form role="form" action="<?php echo $_URL . $_SOURCE . $_CLASS; ?>class_uploadPicture.php"
                          method="POST"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="pictureUpload">Upload Picture</label>
                            <input type="file" id="pictureUpload" name="profilePic"
                                   accept="image/gif, image/jpeg, image/png, image/jpg">

                            <p class="help-block">Allowed Extension:JPEG, JPG, PNG,GIF</p>
                            <button type="submit" class="btn btn-default btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="coachoption">
                <form class="form-horizontal" method="post" role="form"
                      action="<?php echo $_URL . $_SOURCE . $_CLASS; ?>class_uploadPersonal.php">

                    <div class="form-group">
                        <label for="Roles" class="col-sm-2 control-label">Rank</label>

                        <div class="col-sm-10">
                            <select class="form-control" id="rank" name="rank">
                                <option value="CHALLENGER_I">Challenger</option>
                                <option value="MASTER_I">Master</option>
                                <option value="DIAMOND_I">DIAMOND I</option>
                                <option value="DIAMOND_II">DIAMOND II</option>
                                <option value="DIAMOND_III">DIAMOND III</option>
                                <option value="DIAMOND_IV">DIAMOND IV</option>
                                <option value="DIAMOND_V">DIAMOND V</option>
                                <option value="PLATINUM_I">PLATINUM I</option>
                                <option value="PLATINUM_II">PLATINUM II</option>
                                <option value="PLATINUM_III">PLATINUM III</option>
                                <option value="PLATINUM_IV">PLATINUM IV</option>
                                <option value="PLATINUM_V">PLATINUM V</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Roles" class="col-sm-2 control-label">Roles</label>

                        <div class="col-sm-10">
                            <select multiple class="form-control" id="Roles" name="roles[]">
                                <option value="top">Top</option>
                                <option value="jungle">Jungle</option>
                                <option value="mid">Mid</option>
                                <option value="adc">ADC</option>
                                <option value="support">Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Server" class="col-sm-2 control-label">Server</label>

                        <div class="col-sm-10">
                            <select multiple class="form-control" id="Server" name="server[]">
                                <option value="na">North America</option>
                                <option value="eune">Europe Nordic East</option>
                                <option value="euw">Europe West</option>
                                <option value="br">Brazil</option>
                                <option value="tr">Turkey</option>
                                <option value="ru">Russia</option>
                                <option value="lan">Latin America North</option>
                                <option value="las">Latin America South</option>
                                <option value="oce">Oceania</option>
                                <option value="kr">Korea</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Lang" class="col-sm-2 control-label">Language</label>

                        <div class="col-sm-10">
                            <select multiple class="form-control" id="Lang" name="lang[]">
                                <option value="en">English</option>
                                <option value="fr">French</option>
                                <option value="cn">Chinese</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="currentPersonal">

                <div class="currentRank">
                    <button type="button" class="btn btn-default btn-block" aria-label="Left Align">
                        Rank: <?php getRank($_SESSION['loginID']); ?>
                    </button>
                </div>

                <div class="currentRoles">
                    <button type="button" class="btn btn-default btn-block" aria-label="Left Align">
                        Roles: <?php getRoles($_SESSION['loginID']); ?>
                    </button>
                </div>

                <div class="currentServer">
                    <button type="button" class="btn btn-default btn-block" aria-label="Left Align">
                        Servers: <?php getServer($_SESSION['loginID']); ?>
                    </button>
                </div>

                <div class="currentLanguage">
                    <button type="button" class="btn btn-default btn-block" aria-label="Left Align">
                        Languages: <?php getLang($_SESSION['loginID']); ?>
                    </button>
                </div>

                <div class="currentRating">
                    <button type="button" class="btn btn-default btn-block" aria-label="Left Align">
                        <?php getRating($_SESSION['loginID']); ?>
                    </button>
                </div>

                <div class="currentPrice">
                    <button type="button" class="btn btn-default btn-block" aria-label="Left Align">
                        <span class="glyphicon glyphicon-usd icongreen"
                              aria-hidden="true"></span>
                        <?php getPrice($_SESSION['loginID']); ?>
                    </button>
                </div>

                <div class="currentLink">
                    <a type="button" class="btn btn-default btn-block" aria-label="Left Align"
                       href="<?php echo($_URL . "coach/detail.php?pec=" . $_SESSION['loginID']); ?>"
                       target="_blank">
                        <span class="glyphicon glyphicon-search"
                              aria-hidden="true"></span>
                        View Current Profile
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">  <!-- current mission -->

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Current Missions</div>
            <!-- Table -->
            <table class="table">
                <tr>
                    <th>Mission #</th>
                    <th>Hours</th>
                    <th>Date Started</th>
                    <th>Request Complete</th>
                </tr>
                <?php coachCurrentMission($_SESSION['loginID']); ?>

            </table>
        </div>

        <div class="row">  <!-- finished mission -->

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Finished Missions</div>
                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>Mission #</th>
                        <th>Hours</th>
                        <th>Date Started</th>
                        <th>Date Completed</th>
                    </tr>
                    <?php coachCompletedMission($_SESSION['loginID']); ?>

                </table>
            </div>


    <div class="row">
        <div class="col-md-2">
            <div class="coachinfo">

                <div class="comments">
                    Hello
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="editor">
                <form class="form-horizontal" method="post" role="form"
                      action="<?php echo $_URL . $_SOURCE . $_CLASS; ?>class_uploadDesc.php">
                    <div class="form-group">
                        <textarea class="ckeditor" name="desc"><?php printDesc($_SESSION['loginID']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Save</button>
            </div>
        </div>
    </div>
</div>
</div>




<?php include($_ROOT . $_SOURCE . "footer.php"); ?>
</body>
</html>