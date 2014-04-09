<fieldset>
<h3>Results</h3>
<p>An additional grade of <?php echo $_SESSION["test_recieved"] . " out of " . $_SESSION["test_total"]; ?> in the category <strong>"<?php echo $_SESSION["cat"]; ?>"</strong> will change your grade in <strong>"<?php echo $_SESSION["classname"] ?>"</strong> to a
</p>
<?php
    echo "<h2 id=\"grade\">" . $_SESSION["grade"] . "%</h2>";
?>
<div class="btn-toolbar">
    <div class="btn-group">
        <a href="retest.php"><button class="btn btn-primary" type="button"><i class="icon-angle-left"></i> Enter Different Grade</button></a>
    </div>
    <div class="btn-group">
        <a href="startover.php"><button class="btn btn-danger" type="button">Start Over <i class="icon-repeat"></i></button></a>
    </div>
</div>
</fieldset>

