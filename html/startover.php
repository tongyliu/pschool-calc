<?php

    // include stuff
	require("../includes/config.php");
    
    // clear history
    session_unset();
    
    // go home
    redirect("source.php");
    
?>