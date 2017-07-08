<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


    <nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  				</button>

                <a href="home.php" class="navbar-brand">Stock Predictor</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-text">Welcome,
                            <?= $_SESSION["name"] ?>
                        </p>
                    </li>

                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="prediction.php">Prediction</a></li>
                    <li><a href="query.php">Query</a></li>
                    <li><a href="plot.php">Plot</a></li>
                    <li><a href="indicators.php">Indicators</a></li>
                    <li><a href="history.php">History</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
            </div>

        </div>
    </nav>
