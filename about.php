<!DOCTYPE html>
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
    
    .img-center {
        margin: 0 auto;
    }

</style>

<body data-spy="scroll" data-target="#my-navbar">


    <!-- Navbar -->

    <div id="tabs">
        <?php 
            include_once  "tabs.php";
        ?>
    </div>

    <div class="container">
        <section>
            <div class="success" id="faq">
                <h1 class="page-header">About Us</h1>
            </div>
            <div class="row">

                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="aish (5).png" alt="">
                    <h3>Aishwarya Srikanth</h3>
                    <p>Prediction algorithm</p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="govind (2).jpg" alt="">
                    <h3>Govindan Vedanarayanan</h3>
                    <p>User Interface and Testing</p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="hima.jpg" alt="">
                    <h3>Himabindu Paruchuri</h3>
                    <p>Prediction Algorithms and Testing</p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="ramya.jpeg" alt="">
                    <h3>Ramya Tadepalli</h3>
                    <p>Prediction Algorithm and Data Collection</p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="srija.JPG" alt="">
                    <h3>Suma Srija Kommuri</h3>
                    <p>Integration of backend with frontend and Data Collection</p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="swetha.jpg" alt="">
                    <h3>Swetha Vemula</h3>
                    <p>Prediction Algorithm</p>
                </div>

            </div>
            <br><br>
            <pre id="pre">
                Important disclaimer: All trading in the stock market is speculative and losses can and will 
                occur. Commodity trading in particular involves substantial risk of loss and is not suitable for 
                all investors. Past performance is not indicative of future results. Stock Predictor is not 
                an investment advisor or broker, and recommends that all investors consult with a broker or financial 
                professional before making any trades in the stock market.
            </pre>
        </section>
    </div>



    <br><br>

    <!-- Footer -->

    <div id="footer">
        <?php 
        include_once  "footer.php";
        ?>
    </div>

    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
