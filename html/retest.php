<?php

    // include stuff
	require("../includes/config.php");
    
    // reset variables
    $_SESSION["recieved"][$_SESSION["cat"]] -= $_SESSION["test_recieved"];
    $_SESSION["totals"][$_SESSION["cat"]] -= $_SESSION["test_total"];
    
    // go back
    redirect("test.php");

?>