<script type="text/javascript">
function Type(val){ //Function displaying the entry area if type 'other' is selected
    var element=document.getElementById('type');
    var othertype=document.getElementById('typeother');
    if(val=='other'){
        othertype.style.display='block';
    }
    else{
        othertype.style.display='none';
    }
}

function Position(val){//Function displaying the entry area if position 'other' is selected
    var element=document.getElementById('position');
    var otherposition=document.getElementById('positionother');
    if(val=='other'){
        otherposition.style.display='block';
    }
    else{
        otherposition.style.display='none';
    }
}
</script>
</head>
<?php
print("<form action='$stay' method='post'>");
?>

<div>
        <label for="field_id">Field_id</label>
            <input type="text" class="form-control" placeholder="Field_id" name="field_id" value=<?php
                    if (isset($_POST['field_id'])){// Get the element if already exist
                        echo("'".$_POST['field_id']."'");
                    }
    ?>></div>

<div class="form-group">
        <label for="type">Type</label>
            <select class="form-control form-control-sm" name="type" id="type" onchange="Type(this.value)"><?php
                for ($i=0;$i<count($array_type);$i++){// Display the type
                    if ($array_type[$i]!=''){
                        echo('<option value="'.$array_type[$i].'">'.$array_type[$i].'</option>');
                    }
                }
        ?>
                <option value="other">other</option>
            <label for="othertype">Other type</label>
            <input type="text" class="form-control form-control-sm" placeholder="Other type" name="typeother" id="typeother" style="display:none" value=<?php
                    if (isset($_POST['typeother'])){
                        echo("'".$_POST['typeother']."'");
                    }
        ?>>
            <small id="typeHelp" class="form-text text-muted">If you want to add a new type, select other and add a new type in the other form</small>
        </div>


        <div class="form-group">
        <label for="position">Position</label>
            <select class="form-control form-control-sm" name="position" id="position" onchange="Position(this.value)"><?php
                for ($i=0;$i<count($array_position);$i++){// Display the position
                    if ($array_position[$i]!=''){
                        echo('<option value="'.$array_position[$i].'">'.$array_position[$i].'</option>');
                    }
                }
        ?>
                <option value="other">other</option>
            <label for="otherposition">Other position</label>
            <input type="text" class="form-control form-control-sm" placeholder="Other type" name="positionother" id="positionother" style="display:none" value=<?php
                    if (isset($_POST['positionother'])){
                        echo("'".$_POST['positionother']."'");
                    }
        ?>>
            <small id="positionHelp" class="form-text text-muted">If you want to add a new position, select other and add a new position in the other form</small>
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
        <input type="submit" class="btn btn-success" value="add" name="add" method="post">
    </div>
</form>
