<?php
	
	// include stuff
	require("../includes/config.php");
	
    // if submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ($_POST["cat"] != NULL)
        {
            // change the relevant category
            $_SESSION["recieved"][$_POST["cat"]] += $_POST["test_recieved"];
            $_SESSION["totals"][$_POST["cat"]] += $_POST["test_total"];
            
            // calculate grade
            $_SESSION["grade"] = 0;
            foreach ($_SESSION["categories"] as $cat)
            {
                $calc = $_SESSION["recieved"][$cat] / $_SESSION["totals"][$cat] * $_SESSION["weights"][$cat];
                $_SESSION["grade"] += $calc;
            }
            
            $_SESSION["grade"] = round($_SESSION["grade"] * 100);
            
            // make accessible
            $_SESSION["test_recieved"] = $_POST["test_recieved"];
            $_SESSION["test_total"] = $_POST["test_total"];
            $_SESSION["cat"] = $_POST["cat"];
            
            // go go go
            render("disp.php");
        }
        else
        {
            apologize("You must select a category");
        }
    }
    
    // if not yet
    else
    {
        render("test_form.php");
    }

?>