<h3>Weighting</h3>

<p class="instructions">Found <?php echo sizeof($_SESSION["categories"]); ?> categories in the class <strong>"<?php echo $_SESSION["classname"]; ?>"</strong>. Please assign weighting to each category.</p>

<form action="weights.php" method="post">
    <fieldset>
        <?php
            // iterate over categories
            foreach ($_SESSION["categories"] as $cat)
            {
                echo '<strong>"' . "$cat" . '"</strong>';
                print("<div class=\"input-append\"> <input class=\"span1\" name=\"" . $cat ."_weight\" type=\"text\"> <span class=\"add-on\">%</span></div>");
            } 
        ?>
    </fieldset>
    <br/>
    <fieldset>
        <a class="btn btn-small" data-toggle="collapse" data-target="#newcat">Optional: Enter a New Category</a>
        <div id="newcat" class="collapse">
            <fieldset>
                <br/>
                <label>Category Name</label>
                <input type="text" name="new_cat"/>
                <label>Category Weighting</label>
                <div class="input-append">
                    <input class="span1" name="newcat_weight" type="text">
                    <span class="add-on">%</span>
                </div>
            </fieldset>
        </div>
        <button type="submit" class="btn btn-primary">Next <i class="icon-angle-right"></i></button>
    </fieldset>
</form>

<script type="text/javascript">
    $(document).ready(function(){collapse();});
</script>
