<?php

include_once('../core.php');
require($_ROOT . $_SOURCE . $_CLASS . "class_displayCoach.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $_DESC; ?>">
    <meta name="keywords" content="<?php echo $_KEYWORDS; ?>">
    <link rel="stylesheet" href="<?php echo $_URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_URL . $_SOURCE; ?>core.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/style.css">
    <title>Coaches | Pro E Coach</title>

</head>

<body>

<?php require($_ROOT . $_SOURCE . "header.php"); ?>



<div class="jumbotron">
    <div class="container">
        <h1>Professional Electronic Coaching</h1>

        <p>Under construction.</p>
    </div>
</div>


<div class="container">
    <div class="coachesInfo">

        <?php displayCoach(); ?>

        </div>
</div>

<?php require($_ROOT . $_SOURCE . "footer.php"); ?>
</body>
</html>