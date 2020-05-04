<?php
if (isset($_POST['add'])){// If the button 'add' on the form is pressed 
    if (empty($_POST['name'])){// If no 'name' is entered send an alert
        $alert="<div class='alert alert-danger' role='alert'>Failed ! Add a name, please.</div>";
    }
    else {
        $name=$_POST['name'];//reclaim the name (data entered in the form)
        $comment=$_POST['comment'];
        $id=idData('sample_type');//get id from table sample_type from the database
        $value="$id,'$name','$comment'";
        add('sample_type',$value);//add data to the sample_type table in the database and send an alert that it has been done with success
        $alert="<div class='alert alert-success' role='alert'>Success! $name added.</div>";
    }
}
?>
