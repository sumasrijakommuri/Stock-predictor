<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Stock Predictor</title>
    <meta name="description" content="Stock Predictor">

    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="js/jquery-2.2.3.min.js"></script>


</head>

<style>
    body {
        padding-top: 40px;
    }

</style>

<body data-spy="scroll" data-target="#my-navbar" background="stock.jpg">


    <!-- Navbar -->

    <div id="tabs">
        <?php
    include_once "tabs.php";
?>
    </div>

    <br><br>

    <div class="container">
        <div class="row main">
            <h3 class="text-danger">Oops! Password did not match! Try again.</h3>
            <?php
            include_once "signup.html";
            ?>
        </div>

        <br><br>

        <!-- Footer -->

        <div id="footer">

        </div>
    </div>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
