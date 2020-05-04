<?php
    $array_type=getDistinct('storage','type');//get a table of the types existing in the database
    $array_position=getDistinct('storage','position');//get a table of the positions existing in the database
    $array_field_id=getDistinct('storage','field_id');//get a table of the field_id existing in the database
    if (isset($_POST['add'])){// If the button 'add' on the form is pressed
        if (empty($_POST['type'])){// If no 'type' is entered send an alert
            $alert="<div class='alert alert-danger' role='alert'>Failed ! Add a type, please.</div>";
        }
        elseif (empty($_POST['field_id'])){// If no 'field_id' is entered send an alert
            $alert="<div class='alert alert-danger' role='alert'>Failed ! Add a field_id, please.</div>";
        }
        elseif (in_array($_POST['field_id'],$array_field_id)){//If the field_id already exists in the database, send an alert
            $alert="<div class='alert alert-danger' role='alert'>Already existing ! Add a NEW field_id, please.</div>";
        }
        else {

            if ($_POST['type']=='other'){// If 'other' is selected in 'type', reclaim the value entred in the entry area 'Other'
                $type_add=$_POST['typeother'];
            }
            else{// else another 'type' already existing is selected
                $type_add=$_POST['type'];
            }

            if ($_POST['position']=='other'){// If 'other' is selected in 'position', reclaim the value entred in the entry area 'Other'
                $position_add=$_POST['positionother'];
            }
            else{// else another 'position' already existing is selected
                $position_add=$_POST['position'];
            }

            $field_id=$_POST['field_id'];//reclaim the filed_id entered in the form
            $comment=$_POST['comment'];
            $id=idData('storage');// get from the database the id
            $value="$id,'$type_add','$position_add','$field_id','$comment'";
            add('storage',$value);//add storage data in the database and send an alert that it has been added with success
            $alert="<div class='alert alert-success' role='alert'>Success! $field_id added.</div>";
        }
    }
    ?>
