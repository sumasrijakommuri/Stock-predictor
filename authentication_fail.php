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

    <nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

                <a href="index.html" class="navbar-brand">Stock Predictor</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                    <li><a href="index.html"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
                </ul>
            </div>

        </div>
    </nav>

    <br><br><br><br>

    <div class="container">
        <div class="row main">
            <!--   <pre class="text-danger">
        Authentication has failed. You may have entered an invalid Username or password or the system may be experiencing a problem.
        </pre> -->
            <h3 class="text-danger">Username or password entered is incorrect!</h3>
            <h3 class="text-danger">Please try again!</h3>
            <br>
            <?php include_once "index.html" ?>
        </div>
    </div>

    <br><br><br><br>

    <!-- Footer 

    <footer>
        <div class="container-fluid text-center" id="foot">

            <h4>Find us on ...</h4>
            <ul class="list-inline">
                <li><a href="#" target="_blank"><span><img src="tuter.png" height="50" width="50" alt="twitter"></span></a></li>
                <li><a href="#" target="_blank"><span><img src="utube.png" height="50" width="50" alt="youtube"></span></a></li>
                <li><a href="#" target="_blank"><span><img src="link.png" height="50" width="50" alt="linkedin"></span></a></li>
                <li><a href="#" target="_blank"><span><img src="fb.png" height="50" width="50" alt="facebook"></span></a></li>
                <li><a href="#" target="_blank"><span><img src="git.jpeg" height="50" width="50" alt="github"></span></a></li>
            </ul>

            <p>&copy; Copyright @ 2017</p>

        </div>
    </footer> -->

    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
