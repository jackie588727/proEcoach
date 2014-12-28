<?php ob_start();
session_start();
include_once('../core.php');


if ($_SESSION['admin_connected'] != TRUE) {
    header("Refresh:3;../");
}

require($_ROOT . $_SOURCE . $_CLASS . "class_mission.php");

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo $_URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_URL . $_SOURCE; ?>core.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/dashboard.css">
    <title>Admin DashBoard | Pro E Coach</title>
</head>
<body>
<?php include($_ROOT . $_SOURCE . "header.php"); ?>

<div class="container">

    <div class="row"> <!-- start mission -->
        <form class="form-horizontal" method="post" role="form"
              action="<?php echo $_URL . $_SOURCE . $_CLASS; ?>class_startMission.php">
            <div class="form-group">
                <label for="coachID">Coach ID</label>
                <input name="coachID" type="text" class="form-control" id="coachID" placeholder="Enter Coach ID"
                       required>
            </div>
            <div class="form-group">
                <label for="coachHour">Receiver Name</label>
                <input name="receiver" type="text" class="form-control" id="coachHour" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="coachHour">Hours</label>
                <input name="hours" type="text" class="form-control" id="coachHour" placeholder="Hours" required>
            </div>
            <div class="form-group">
                <label for="transactionID">Transaction ID</label>
                <input name="tranID" type="text" class="form-control" id="transactionID" placeholder="ID from shop"
                       required>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

    <div class="row">  <!-- current mission -->

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Current Missions</div>
            <!-- Table -->
            <table class="table">
                <tr>
                    <th>Mission #</th>
                    <th>Coach #</th>
                    <th>Receiver Name</th>
                    <th>Hours</th>
                    <th>Transaction ID</th>
                    <th>Rate Key</th>
                    <th>Date Started</th>
                    <th>Request Complete</th>
                </tr>
                <?php currentMission(); ?>

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
                        <th>Coach #</th>
                        <th>Receiver Name</th>
                        <th>Hours</th>
                        <th>Transaction ID</th>
                        <th>Rate Key</th>
                        <th>Date Started</th>
                        <th>Date Completed</th>
                    </tr>
                    <?php completedMission(); ?>

                </table>
            </div>

            <div class="row">   <!-- new comments -->


            </div>


        </div>




        <?php include($_ROOT . $_SOURCE . "footer.php"); ?>
</body>
</html>