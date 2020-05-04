<?php

    $array_field_id=getDistinct('territory','field_id');//get a table of the 'field_id' existing in the database
    $array_year=getDistinct('year','year');
    $array_aspect=getDistinct('territory','aspect');
    print_r($array_aspect);
    $array_study_site_id=getOrder('study_site','id','id');//get a table of the study_site id ordered by the id
    $array_study_site_name=getOrder('study_site','name','id');
    $array_study_site=array();
    for ($i=0;$i<count($array_study_site_id);$i++){//browse the table 
        $array_study_site[$array_study_site_id[$i]]=$array_study_site_name[$i];
    }
    if (isset($_POST['add_territory'])){// If the button 'add' on the form is pressed 
        if (empty($_POST['field_id'])){// If no 'field_id' is entered send an alert
            $alert="<div class='alert alert-danger' role='alert'>Failed ! Add a field_id, please.</div>";
        }
        elseif (empty($_POST['study_site'])){// If no 'study_site' is entered send an alert
            $alert="<div class='alert alert-danger' role='alert'>Failed ! Choose a study_site, please.</div>";
        }
        elseif (in_array($_POST['field_id'],$array_field_id)){// If the 'field_id' entered aleady exists in the database, send an alert
            $alert="<div class='alert alert-danger' role='alert'>Already existing ! Add a NEW territory, please.</div>";
        }
        else{
            if ($_POST['aspect']=='other'){ // If 'other' is selected in 'aspect', reclaim the value entred in the entry area 'Other'
                $aspect=$_POST['aspectother'];
            }
            else{
                $aspect=$_POST['aspect']; // else another 'aspect' already existing is selected
            }
            $id=idData('territory');//get id from the table territory from the database
            $study_site=$_POST['study_site'];//reclaim study_site from the data entered
            $year=$_POST['year'];
            $field_id=$_POST['field_id'];
            $burrow_nb=$_POST['burrow_nb'];
            if (empty($burrow_nb)){//if no burrow_nb entered in the form, fill with 'NULL'
                $burrow_nb='NULL';
            }
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
            }
            $snowmelt_date=$_POST['snowmelt_date'];
            if (empty($snowmelt_date)){//if no 'snowmelt_date' entered, fill with 'NULL'
                $snowmelt_date='NULL';
                $value="$id,'$field_id',$burrow_nb,'$aspect',$surface,$vegetation,$snowmelt_date,'$comment',$study_site,$year,'$latitude','$longitude','$altitude'";
            }
            else {
                $value="$id,'$field_id',$burrow_nb,'$aspect',$surface,$vegetation,'$snowmelt_date','$comment',$study_site,$year,'$latitude','$longitude','$altitude'";
            }
            add('territory',$value);//add territory data in the database and send an alert that it has been added with success
            $alert="<div class='alert alert-success' role='alert'>Success! $field_id added.</div>";
        }
    }
?>
