<?php

    $array_type=getDistinct('protocol','type'); //get in an array, the different types of protocol present in the database


    if (isset($_POST['add'])){ //if the button 'add' on the form is pressed
        if (empty($_FILES['file']['name'])){ //if there is no file's name (no file added), send an alert that it failed 
            $alert="<div class='alert alert-danger' role='alert'>Failed ! Add a file, please.</div>";
        }
        else if (empty($_POST['name'])){ //if there is no protocol's name (no file added), send an alert that it failed 
            $alert="<div class='alert alert-danger' role='alert'>Failed ! Add a name, please.</div>";
        }
        else {

            if ($_POST['type']=='other'){// If 'other' is selected in 'type', reclaim the value entred in the entry area 'Other'
                $type_add=$_POST['typeother'];
            }
            else{ // else another 'type' already existing is selected
                $type_add=$_POST['type'];
            }

            $idF=idData('protocol_files'); //get the id from the protocol_files table in the database
            $filename=$_FILES['file']['name'];     //Le nom original du fichier, comme sur le disque du visiteur
            $filesize=$_FILES['file']['size'];     //La taille du fichier en octets.
            $web_path="/marmota/upload/protocol"; 
            $system_path="/var/www/marmota/upload/protocol";
            $valueF="$idF,'$filename','$filesize','$web_path','$system_path'";
            add('protocol_files',$valueF);//add the file data to the database in protocol_files table
            $alert="<div class='alert alert-success' role='alert'>Success! $filename added.</div>";//alert that the file has been added with success
            
            $name=$_POST['name'];//reclaim the protocol name
            $comment=$_POST['comment'];//reclaim the comment 
            $protocol_file_id=idData('protocol_files')-1; //get from the table protocol_files in the database the id which is the protocol_file_id in the protocol table
            $idP=idData('protocol');
            $valueP="$idP,'$name','$type_add','$comment',$protocol_file_id";
            add('protocol',$valueP);//add protocol data to the database and send an laert that it has been done with success
            $alert="<div class='alert alert-success' role='alert'>Success! $name added.</div>";
            }
    }
?>
