<h3>Enter grade</h3>

<form action="test.php" method="post">
    <fieldset>
        <label>Select a Category</label>
        <select name="cat">
        <option></option>
        <?php
            foreach ($_SESSION["categories"] as $cat)
            {
                print("<option>" . $cat . "</option>");
            }
        ?>
        </select>
        <label>Enter Grade</label>
        <input name="test_recieved" class="input-mini" type="text" placeholder="Recieved"/>
        /
        <input name="test_total" class="input-mini" type="text" placeholder="Total"/>
        <br/>
        <button type="submit" class="btn btn-primary">Finish <i class="icon-angle-right"></i></button>
    </fieldset>
</form>

</h3>