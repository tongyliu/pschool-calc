<?php
	
	// include stuff
	require("../includes/config.php");
	
    // if submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $percenttotals = 0;
        $_SESSION["weights"] = array();
        foreach ($_SESSION["categories"] as $cat)
        {
            $weight_name = $cat . "_weight";
            $percenttotals += $_POST[$weight_name];
            $_SESSION["weights"][$cat] = $_POST[$weight_name]/100;
        }
        if ($_POST["newcat_weight"] != NULL)
        {
            if ($percenttotals + $_POST["newcat_weight"] != 100)
            {
                apologize("Percentages must add up to 100%");
            }
            else
            {
                $_SESSION["categories"][] = $_POST["new_cat"];
                $_SESSION["weights"][$_POST["new_cat"]] = $_POST["newcat_weight"] / 100;
                $_SESSION["recieved"][$_POST["new_cat"]] = 0;
                $_SESSION["totals"][$_POST["new_cat"]] = 0;
            }
        }
        else if ($percenttotals != 100)
        {
            apologize("Percentages must add up to 100%");
        }
    
        // next step
        redirect("test.php");
    }
    
    // if not yet
    else
    {
        render("weights_form.php");
    }
    
?>