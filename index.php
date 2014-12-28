<?php include_once('core.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $_DESC; ?>">
    <meta name="keywords" content="<?php echo $_KEYWORDS; ?>">
    <link rel="stylesheet" href="<?php  echo $_URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php  echo $_URL.$_SOURCE; ?>core.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/style.css">
    <title>Pro E Coach | League of Legend Coaching</title>

</head>

<body>

<?php include($_ROOT.$_SOURCE."header.php"); ?>


<div class="jumbotron">
    <div class="container">
        <h1>Professional Electronic Coaching</h1>

        <p>Under construction.</p>
    </div>
</div>

<div class="informations">
    <div class="container">
        <h2>Informations</h2>

        <p>Tired of losing in Rank? We can help you. Teach you from absolute ZERO!</p>

        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="http://goo.gl/L2xWnV" alt="championship"/>
                </div>
                <div class="thumbnail">
                    <img src="http://www.capsulecomputers.com.au/wp-content/uploads/2013/09/Lol-S3-Worlds-001.jpg"
                         alt="img"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="http://goo.gl/hht6g0" alt="img"/>
                </div>
                <div class="thumbnail">
                    <img src="http://goo.gl/ipbFnp" alt="img"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="http://goo.gl/G7x9pW" alt="img"/>
                </div>
                <div class="thumbnail">
                    <img src="http://goo.gl/yLb9AH" alt="img"/>
                </div>
            </div>
        </div>
    </div>

</div>


<?php require($_ROOT.$_SOURCE."footer.php"); ?>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-57022202-1', 'auto');
    ga('send', 'pageview');

</script>


</html>