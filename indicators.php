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

</style>

<body data-spy="scroll" data-target="#my-navbar">


    <!-- Navbar -->

    <div id="tabs">
        <?php 
            include_once "tabs.php";
        ?>
    </div>



    <br>
    <!-- body-->
    <div class="container">
        <section>
            <div class="page-header" id="history">
                <h1 class="success">Indicator Plots</h1>
            </div>

        </section>
    </div>
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

        </div>
        <div class="col-sm-4 text-center">
            <button id="plot" name="plot" class="btn btn-warning center-block">Plot Indicators</button>
        </div>
        <div class="col-sm-4 text-center">

        </div>
    </div>


    <div align="center" style="margin:0 auto">
        <img src="plot.png" style="width:600px;height:480px;">
    </div>
    <br><br>
    <br><br>

    <div align="center" id="result"></div>

    <!-- Footer -->

    <div id="footer">
        <?php 
        include_once  "footer.php";
        ?>
    </div>

    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#plot").click(function() {
                $.ajax({
                    type: "POST",
                    url: "indiplot.php",
                    data: {
                        "company": $("#company").find('option:selected').val()
                    },
                    error: function() {
                        console.log("Error in shortTerm");
                    },
                    success: function(response) {
                        location.reload(true);
                        $("#result").html(response);
                    }
                });
            });

        });

    </script>

</body>

</html>
