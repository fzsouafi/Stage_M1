<!-- This is the color form, which you can add a new color non exist.-->

<?php
print("<form action='$stay' method='post'>");
?>
<div class="form-group">
<div class="modal-body"> <!-- a hidden form used to keep the year selected -->
        <select class="custom-select" id="disabledSelect" style="display:none" name="year">
        <?php
            
            print("<option type='hidden' value='$current_year' selected='selected'>$current_year</option>");
            ?>
        </select>
</div>

<!-- The name of color that you want to grab.-->
<div class="form-group col-md-4">
    <label for="add_name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="add_name">
</div>

<!-- The button of add-->
<div>
        <button type="submit" class="btn btn-success" value="add_color" name="add_color" method="post">Add</button>
</div>
</div>
</form>

