<?php ob_start();session_start();

include_once('../core.php');
require($_ROOT.$_SOURCE.$_CLASS."class_setup.php");
require($_ROOT.$_SOURCE.$_CLASS."class_coachID.php");


if (isset($_SESSION['loginID']) && $_SESSION['connected'] == TRUE) {
    header("Location:dashboard.php");
}


if (isset($_POST['coachlogin'])) {
    if (checkLogin($_POST['coachlogin'], $_POST['password'])) {
        if (checkGroup($_POST['coachlogin'])) {
            $_SESSION['loginID'] = getID($_POST['coachlogin']);
            $_SESSION['connected'] = True;
            header("Location:dashboard.php");
        } else {
            ?>
            <div class="container">
                <div id="fadenotification">
                    <div class="alert alert-danger" role="alert">
                        <strong>You do not have permission for this page!</strong>
                    </div>
                </div>
            </div>

        <?php
        }
    } else {
        ?>
        <div class="container">
            <div id="fadenotification">
                <div class="alert alert-danger" role="alert">
                    <strong>Username/Email or Password is incorrect. Try again!</strong>
                </div>
            </div>
        </div>

    <?php
    }

}


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $_DESC; ?>">
    <meta name="keywords" content="<?php echo $_KEYWORDS; ?>">
    <link rel="stylesheet" href="<?php  echo $_URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php  echo $_URL.$_SOURCE; ?>core.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <title>Coach Login</title>
</head>
<body>

<?php include($_ROOT.$_SOURCE."header.php"); ?>





<div class="container">
    <div class="login-form">
        <h1>Coach Login</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form">
            <div class="form-group">
                <label for="loginuser">User Name</label>
                <input name="coachlogin" type="text" class="form-control" id="loginuser" placeholder="Enter Login">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>



<?php require($_ROOT.$_SOURCE."footer.php"); ?>
<script> $('#fadenotification').delay(5000).fadeOut(400);</script>

</body>

</html>