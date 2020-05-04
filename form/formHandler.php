<head>
<script type="text/javascript">
function Status(val){ //Function displaying the entry area if Status 'other' is selected
    var element=document.getElementById('status');
    var otherstatus=document.getElementById('statusother');
    if(val=='other'){
        otherstatus.style.display='block';
    }
    else{
        otherstatus.style.display='none';
    }
}
</script>
</head>
<?php
    print("<form action='$stay' method='post'>"); //This form allows us to add a new handler who doesn't exist in the database
    ?>
    <div>
    <label for="year">Year</label>
    <select class="custom-select" id="handler_year" name="handler_year">
                <?php
                    print("<option type='hidden' value='$current_year' selected='selected'>$current_year</option>"); //here the year is pre-selected
                    ?>
            </select>
    </div>
    <div class="row">
        <div class="col">
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" placeholder="Last name" name="last_name" value=<?php
                    if (isset($_POST['last_name'])){ //Allows to pre-fill the 'last name' entry in case the page is reloaded
                        echo("'".$_POST['last_name']."'");
                    }
    ?>></div>
        <div class="col">
            <label for="first_name">First Name</label><input type="text" class="form-control" placeholder="First name" name="first_name" value=<?php
                if (isset($_POST['first_name'])){ //Allows to pre-fill the 'First name' entry in case the page is reloaded
                    echo("'".$_POST['first_name']."'");
                }
    ?>></div>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
            <input type="email" class="form-control" placeholder="example@xxx.com" name="email" value=<?php
        if (isset($_POST['email'])){ //Allows to pre-fill the 'email' entry in case the page is reloaded
            echo("'".$_POST['email']."'");
        }
        ?>>
        <label for="status">Status</label>
            <select class="form-control form-control-sm" name="status" id="status" onchange="Status(this.value)"><?php
                for ($i=0;$i<count($array_status);$i++){ //Browse the Status list 
                    if ($array_status[$i]!=''){
                        echo('<option value="'.$array_status[$i].'">'.$array_status[$i].'</option>');
                    }
                }
        ?>
                <option value="other">other</option>
            <label for="otherstatus">Other status</label>
            <input type="text" class="form-control form-control-sm" placeholder="Other status" name="statusother" id="statusother" style="display:none" value=<?php
                    if (isset($_POST['statusother'])){
                        echo("'".$_POST['statusother']."'");
                    }
        ?>>
            <small id="statusHelp" class="form-text text-muted">If you want to add a new status, select other and add a new status in the other form</small>
        </div>
    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea class="form-control" placeholder="Add a comment here" name="comment" rows=4 cols=40><?php
            if (isset($_POST['comment'])){//Allows to pre-fill the 'comment' entry in case the page is reloaded
                echo($_POST['comment']);
            }
        ?></textarea>
    </div>
    <div>
    <input type="submit" class="btn btn-success" value="add" name="add_handler" method="post">
    </div>
</form>
