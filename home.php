<?php
session_start();
$name = $_SESSION["name"];
$username = $_SESSION["username"];
?>

    <html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Stock Predictor</title>
        <meta name="description" content="Stock Predictor">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="home.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <script src="js/jquery-2.2.3.min.js"></script>

    </head>

    <style>
        body {
            padding-top: 40px;
        }

    </style>

    <body data-spy="scroll" data-target="#my-navbar">


        <!-- Navbar -->
        <div id="tabs">
            <?php 
            include_once "tabs.php";
        ?>
        </div>

        <!-- Jumbotron -->

        <div class="jumbotron">
            <div class="container text-center">

                <h1 class="success">Stock Predictor</h1>
                <pre id="pre">
        Who does not want to make a supplementary income? With the right resources, investing 
        in the stock market is one of the easiest ways. This application provides the stock 
        trader some basic tools to help make some informed decisons.
      </pre>

            </div>
        </div>


        <!-- Container -->

        <div class="container">
            <section>

                <div class="carousel slide" id="screenshot-carousel" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#screenshot-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#screenshot-carousel" data-slide-to="1"></li>
                        <li data-target="#screenshot-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="intro.png" alt="Text of the image">
                            <div class="carousel-caption">
                                <h3>Stocks</h3>
                            </div>
                        </div>
                        <div class="item">
                            <img src="warren.png" alt="Text of the image">
                            <div class="carousel-caption">
                                <h3>Warren Buffet</h3>
                            </div>
                        </div>
                        <div class="item">
                            <img src="short_long.png" alt="Text of the image">
                            <div class="carousel-caption">
                                <h3>Which one to choose?</h3>
                            </div>
                        </div>
                    </div>

                    <a href="#screenshot-carousel" class="left carousel-control" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>

                    <a href="#screenshot-carousel" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>

                </div>

            </section>
        </div>

        <br>


        <!-- Footer -->

        <div id="footer">
            <?php 
            include_once "footer.php";
        ?>
        </div>

        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>



    </body>

    </html>
