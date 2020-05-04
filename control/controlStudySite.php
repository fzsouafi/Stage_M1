<?php
    if (isset($_POST['add_study_site'])){// If the button 'add' on the form is pressed 
        if (empty($_POST['name'])){ // If no 'name' is entered send an alert
            $alert="<div class='alert alert-danger' role='alert'>Failed ! Add a name, please.</div>";
        }
        elseif (empty($_FILES['map']['name'])){ // If no file is added in map send an alert
            $alert="<div class='alert alert-danger' role='alert'>Failed ! Add a map, please.</div>";
        }
        else{
            $id=idData('study_site');// get the id from study site table from the database
            $name=$_POST['name'];//reclaim name from the data entry in the form
            $description=$_POST['description'];
            $comment=$_POST['comment'];
            $map="/var/www/marmota/upload/protocol/".$_FILES['map']['name'];//keep the path and name of the file added in map
            $latitude=$_POST['latitude'];
            $longitude=$_POST['longitude'];
            $altitude=$_POST['altitude'];
            /*if (empty($burrow_nb)){
                $burrow_nb='NULL';
            }
            $aspect=$_POST['aspect'];
            if (empty($aspect)){
                $aspect='NULL';
            }
            $surface=$_POST['surface'];
            if (empty($surface)){
                $surface='NULL';
            }
            $vegetation=$_POST['vegetation'];
            if (empty($vegetation)){
                $vegetation='NULL';
            }
            $snowmelt_date=$_POST['snowmelt_date'];
            if (empty($snowmelt_data)){
                $snowmelt_date='NULL';
                           }
            $comment=$_POST['comment'];
            if (empty($comment)){
                $comment='NULL';
            }
            $latitude=$_POST['latitude'];
            if (empty($latitude)){
                $latitude='NULL';
            }
            $longitude=$_POST['longitude'];
            if (empty($longitude)){
                $longitude='NULL';
            }
            $altitude=$_POST['altitude'];
            if (empty($altitude)){
                $altitude='NULL';
            }*/
            $value="$id,'$name','$description','$comment','$map','$latitude','$longitude','$altitude'";
            add('study_site',$value);//add study_site data to the database and send an alert that it has been added with success
            $alert="<div class='alert alert-success' role='alert'>Success! $name added.</div>";
        }
    }
?>

