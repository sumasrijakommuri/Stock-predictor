<?php

    $company =  isset($_POST['company'])       ? htmlspecialchars(trim($_POST['company']))      : null;

    $cmd = "python -W ignore sma-ema-plot.py ".$company;
    
exec("$cmd",$output);
echo "Plot generated $company";

?>
