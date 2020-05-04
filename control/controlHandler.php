<?php
    $array_status=getDistinct('handler','status'); //get a table of the 'status' existing in the database
    $array_last_name=getDistinct('handler','last_name'); //get a table of the 'last_name' existing in the database
    if (isset($_POST['add_handler'])){ // If the button 'add' on the form is pressed 
        if (empty($_POST['last_name'])){ // If no 'last_name' is entered send an alert
            $alert='<div class="alert alert-danger" role="alert">Failed ! Add a <a data-toggle="modal" data-target="#exampleModal" class="alert-link">last name</a> please</div>';
        }
        elseif (empty($_POST['first_name'])){ // If no 'first_name' is entered send an alert
            print('vide');
            $alert='<div class="alert alert-danger" role="alert">Failed ! Add a <a data-toggle="modal" data-target="#exampleModal" class="alert-link">first name</a> please</div>';
        }
        elseif (empty($_POST['email'])){ // If no 'email' is entered send an alert
            $alert='<div class="alert alert-danger" role="alert">Failed !Add a <a data-toggle="modal" data-target="#exampleModal" class="alert-link">Email</a> please</div>';
        }
        elseif (empty($_POST['status'])){ // If no 'status' is entered or selected send an alert
            $alert='<div class="alert alert-danger" role="alert">Failed ! Add a <a data-toggle="modal" data-target="#exampleModal" class="alert-link">status</a> please</div>';
        }
        elseif (empty($_POST['handler_year'])){ // If no 'handler_year' is selected send an alert
            $alert='<div class="alert alert-danger" role="alert">Failed ! Choose a <a data-toggle="modal" data-target="#exampleModal" class="alert-link">year for new handler</a> please</div>';
        }
        elseif (in_array($_POST['last_name'],$array_last_name)){ // If the 'last-name' entered aleady exists in the database, send an alert
            $alert="<div class='alert alert-danger' role='alert'>Already existing ! Add a NEW handler, please.</div>";
        }
        else{
            if ($_POST['status']=='other'){ // If 'other' is selected in 'Status', reclaim the value entred in the entry area 'Other'
                $status_add=$_POST['statusother'];
            }
            else{
                $status_add=$_POST['status']; // else another 'Status' already existing is selected
            }
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ // If the 'email' is valid, reclaim all data entered in the form
                $email_add=$_POST['email'];
                $id_add=idData('handler');
                $last_name_add=$_POST['last_name'];
                $first_name_add=$_POST['first_name'];
                $comment_add=$_POST['comment'];
                $provider_name_add=$_POST['provider_name'];
                $handler_year=$_POST['handler_year'];
                $value="$id_add,'$last_name_add','$first_name_add','$status_add','$comment_add','','$email_add'";
                add('handler',$value);// add data entered in 'handler' table in the database
                $value="$id_add,$handler_year,''";
                add('handler_year',$value); //add data in 'handler_year' table in the database
                //send an alert that the handler has been added with success
                $alert='<div class="alert alert-success alert-dismissible fade show" role="alert">Success ! '.$last_name_add.' '.$first_name_add.' added.<a data-toggle="modal" data-target="#exampleModal" class="alert-link">Click to add a new handler.</a></div>';
                
            }
            else{ // If the 'email' is not valid, send an alert that the add failed 
                $alert='<div class="alert alert-danger" role="alert">Failed !<a data-toggle="modal" data-target="#exampleModal" class="alert-link">Email not valid</a></div>';
            }
        }
    }
?>
