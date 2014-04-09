<?php
	
	// include stuff
	include("../includes/simple_html_dom.php");
	require("../includes/config.php");
	
    // if submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // get source from form
        if ($_POST["source"] != NULL)
        {
            $source = $_POST["source"];
            
            // get DOM
            $pshtml = str_get_html($source);
            
            // get title for confirmation
            $titles = $pshtml->find("title");
            $title = "blarg";
            if ($titles != NULL)
            {
                $title = $titles["0"]->plaintext;
            }
            
            if ($title != "Class Score Detail")
            {
                apologize("That doesn't look like PowerSchool source code.");
            }
            
            // get array of teds
            $tds = $pshtml->find("td");
            
            // determine class name
            $_SESSION["classname"] = $tds[0]->plaintext;
            
            // iterate over teds
            $max = sizeof($tds);
            $category = NULL;
            $nulled = 0;
            $categories = array();
            $recieved = array();
            $totals = array();
            for ($i = 0; $i < $max; $i++)
            {
                // only parse relevant information
                if ($i % 11 == 0 && $i > 1)
                {
                    $nuls = $tds[$i]->find("img");
                    if ($nuls != null)
                    {
                        $nulled = 1;
                    }
                    else $nulled = 0;
                }
                
                if ($i % 11 == 5)
                {
                    $category = $tds[$i]->plaintext;
                    if (!in_array($category, $categories))
                    {
                        $categories[] = $category;
                        $recieved[$category] = 0;
                        $totals[$category] = 0;
                    }
                }  
                else if ($i > 11 && $i % 11 == 1 && $nulled == 0)
                {
                    $grade_arr = $tds[$i]->find("span");
                    $grade = $grade_arr[0]->innertext;
                    if (strpos($grade, "/") != false)
                    {
                        list($recieved_cur, $total_cur) = explode("/", $grade, 2);
                        if ($recieved_cur != "--")
                        {
                            $recieved[$category] += $recieved_cur;
                            $totals[$category] += $total_cur;
                        }
                    }
                }
            }
            
            // make variables globally accessible
            $_SESSION["categories"] = $categories;
            $_SESSION["recieved"] = $recieved;
            $_SESSION["totals"] = $totals;
            
            $pshtml->clear();
            unset($pshtml);
            
            // move on to next step
            redirect("weights.php");
        }
        
        else
        {
            apologize("That doesn't look like PowerSchool source code.");
        }
    }
    
    // if not yet submitted
    else
    {
        render("get_source.php");
    }
		
?>

