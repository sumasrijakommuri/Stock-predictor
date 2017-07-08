<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Stock Predictor</title>
    <meta name="description" content="Stock Predictor">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.css">

</head>

<style>
    body {
        padding-top: 40px;
    }
    
    .dropdown {
        left: 50%;
        right: auto;
        transform: translate(-50%, 0);
        text-align: center;
    }
    
    .dropdown-menu {
        width: 200px;
        left: 50%;
        margin-left: -100px;
    }
    
    #singlebutton {
        width: 200px;
    }

</style>

<body data-spy="scroll" data-target="#my-navbar">


    <!-- Navbar -->
    <div id='nav-bar'>
        <?php 
        include_once  "tabs.php";
        ?>
    </div>




    <div class="container">
        <section>
            <div class="page-header" id="faq">
                <h1 class="success">Prediction</h1>
            </div>
            <pre id="pre" class="text-center">
  You can obtain a prediction on the long term or short term trend of any stock here.
  Are you looking for short term gains? Choose Short term prediction. Perhaps 
  you are interested in long term gains. Choose Long term prediction.
  </pre>
        </section>
    </div>

    <br>

    <div class="container">
        <h4 class="text-center">Choose a company and the type of prediction</h4>
        <br>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="dropdown">
                    <select id="company" class="form-control btn-primary">
                    <option value="GOOG">Google</option>
                    <option value="YHOO">Yahoo</option>
                    <option value="MSFT">Microsoft</option>
                    <option value="INTC">Intel</option>
                    <option value="ERIC">Ericsson</option>
                    <option value="MAT">Mattel</option>
                    <option value="CSCO">Cisco</option>
                    <option value="AMZN">Amazon</option>
                    <option value="FB">Facebook</option>
                    <option value="AAPL">Apple</option>
                </select>
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div>


        <br><br>

        <div class="row">
            <div class="col-sm-4 text-center">
                <button id="shortTerm" name="shortTerm" class="btn btn-warning center-block">Short Term</button>
            </div>
            <div class="col-sm-4 text-center">
                <button id="longTerm" name="longTerm" class="btn btn-warning center-block">Long Term</button>
            </div>
            <div class="col-sm-4 text-center">
                <button id="decision" name="decision" class="btn btn-warning center-block">Decision</button>
            </div>
        </div>


        <br><br><br>
        <h3 align="center" id="result" style="color:#2d6ca2"></h3>
    </div>

    <br>
    <br><br>
    <!-- Footer -->

    <footer>
        <?php 
        include_once  "footer.php";
        ?>
    </footer>

    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#shortTerm").click(function() {
                $.ajax({
                    type: "POST",
                    url: "shortTerm.php",
                    data: {
                        "company": $("#company").find('option:selected').val()
                    },
                    error: function() {
                        console.log("Error in shortTerm");
                    },
                    success: function(response) {
                        $("#result").html(response);
                    }
                });
            });

            $("#longTerm").click(function() {
                $.ajax({
                    type: "POST",
                    url: "longTerm.php",
                    data: {
                        "company": $("#company").find('option:selected').val()
                    },
                    error: function() {
                        console.log("Error in shortTerm");
                    },
                    success: function(response) {
                        $("#result").html(response);
                    }
                });
            });

            $("#decision").click(function() {
                $.ajax({
                    type: "POST",
                    url: "decision.php",
                    data: {
                        "company": $("#company").find('option:selected').val()
                    },
                    error: function() {
                        console.log("Error in shortTerm");
                    },
                    success: function(response) {
                        $("#result").html(response);
                    }
                });
            });

        });

    </script>

</body>

</html>
