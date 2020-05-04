<head>
<script type="text/javascript">
function Type(val){//Function displaying the entry area if Status 'other' is selected
    var element=document.getElementById('type');
    var othertype=document.getElementById('typeother');
    if(val=='other'){
        othertype.style.display='block';
    }
    else{
        othertype.style.display='none';
    }
}
</script>
</head>
<div style="background: #FDFEFE;">
  <h1> Protocol-file Form </h1>
</div>
<body>


    <?php
        if (isset($alert)){ //Check if an alert message exist
            echo($alert);
        }
    ?>

<div>
<?php
print("<form action='$stay' method='post' enctype='multipart/form-data'>");
?>
        <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name" value=<?php
                    if (isset($_POST['name'])){// Get the element if it already exists
                        echo("'".$_POST['name']."'");
                    }
            ?>></div>


        <div class="form-group">
        <label for="type">Type</label>
            <select class="form-control form-control-sm" name="type" id="type" onchange="Type(this.value)"><?php
                for ($i=0;$i<count($array_type);$i++){
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
        <div>

            <br><br>
            <label for="file">Add a file</label>
            <input type="file" id="file" name="file" multiple><?php

                    ?>
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
        <br>
        <input type="submit" class="btn btn-success" value="add" name="add" method="post">
    </div>
        </div>
        </form>
    </div>

</body>
