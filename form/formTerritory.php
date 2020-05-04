<script type="text/javascript">
function Status(val){ //Function displaying the entry area if Status 'other' is selected
    var element=document.getElementById('aspect');
    var otherstatus=document.getElementById('aspectother');
    if(val=='other'){
        otherstatus.style.display='block';
    }
    else{
        otherstatus.style.display='none';
    }
}
</script>
<div class="container-fluid">
    <?php
    print("<form action='$stay_territory' method='post'>"); //This form allows us to add a new territory who doesn't exist in the database
    ?>
<div class="input-group mb-3">
<div class="input-group-prepend">
<label class="input-group-text" for="year">year</label>
</div>
<select class="custom-select" id="disabledSelect" name="year">
        <?php
            print("<option value='$current_year' selected='selected'>$current_year</option>");
            ?>
</select>
</div>
<div>
    <label for="study_site">Study Site</label>
        <select class="custom-select" id="study_site" name="study_site"><?php
            
            print("<option value=$study_site_choose>$study_territory[$study_site_choose]</option>");
    ?>
</div>
    <div class="form-row">
        <label for="field_id">Field_id</label>
            <input type="text" class="form-control" placeholder="Field_id" name="field_id" value=<?php
                    if (isset($_POST['field_id'])){// Get the element if it already exists
                        echo("'".$_POST['field_id']."'");
                    }
    ?>></div>
    <div class="form-row">
        <label for="snowmelt_date">Snowmelt_date</label>
            <input type="date" class="form-control" placeholder="Snowmelt_date" name="snowmelt_date" value=<?php
                    if (isset($_POST['snowmelt_date'])){
                        echo("'".$_POST['snowmelt_date']."'");
                    }
    ?>></div>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="burrow_nb">Burrow_nb</label>
            <input type="number" class="form-control" placeholder="Burrow_nb" name="burrow_nb" value=<?php
                    if (isset($_POST['burrow_nb'])){
                        echo("'".$_POST['burrow_nb']."'");
                    }
    ?>></div>
    <div class="form-group col-md-4">
        <label for="surface">Surface</label>
            <input type="number" class="form-control" placeholder="Surface" name="surface" value=<?php
                    if (isset($_POST['surface'])){
                        echo("'".$_POST['surface']."'");
                    }
    ?>></div>
    <div class="form-group col-md-4">
        <label for="vegetation">Vegetation</label>
            <input type="number" class="form-control" placeholder="Vegetation" name="vegetation" value=<?php
                    if (isset($_POST['vegetation'])){
                        echo("'".$_POST['vegetation']."'");
                    }
    ?>></div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="latitude">Latitude</label>
            <input type="text" class="form-control" placeholder="Latitude" name="latitude" value=<?php
                    if (isset($_POST['latitude'])){
                        echo("'".$_POST['latitude']."'");
                    }
    ?>></div>
    <div class="form-group col-md-4">
        <label for="longitude">Longitude</label>
            <input type="text" class="form-control" placeholder="Longitude" name="longitude" value=<?php
                    if (isset($_POST['longitude'])){
                        echo("'".$_POST['longitude']."'");
                    }
    ?>></div>
    <div class="form-group col-md-4">
        <label for="altitude">Altitude</label>
            <input type="text" class="form-control" placeholder="Altitude" name="altitude" value=<?php
                    if (isset($_POST['altitude'])){
                        echo("'".$_POST['altitude']."'");
                    }
    ?>></div>
    </div>
    <div>
        <label for="status">Aspect</label>
            <select class="form-control form-control-sm" name="aspect" id="aspect" onchange="Status(this.value)"><?php
                for ($i=0;$i<count($array_aspect);$i++){ //Browse the Status list
                    if ($array_aspect[$i]!=''){
                        echo('<option value="'.$array_aspect[$i].'">'.$array_aspect[$i].'</option>');
                    }
                }
        ?>
                <option value="other">other</option>
            <label for="otheraspect">Other aspect</label>
            <input type="text" class="form-control form-control-sm" placeholder="Other aspect" name="aspectother" id="aspectother" style="display:none" value=<?php
                    if (isset($_POST['aspectother'])){
                        echo("'".$_POST['aspectother']."'");
                    }
        ?>>
            <small id="statusHelp" class="form-text text-muted">If you want to add a new status, select other and add a new status in the other form</small>
    </div>
    <div>
        <label for="comment">Comment</label>
        <textarea class="form-control" placeholder="Add a comment here" name="comment" rows=4 cols=40><?php
            if (isset($_POST['comment'])){
                echo($_POST['comment']);
            }
        ?></textarea>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="add" name="add_territory" method="post">
    </div>
</form>
</div>
