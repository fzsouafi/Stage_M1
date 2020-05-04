<?php
    include("controlTerritory.php");//use the controlTerritory for adding a new territory to the database

    $current_year=intval($_GET['year']);//reclaim the integer value from the string
    $last_year=$current_year-1;// get the previous year
    

    if (isset($_POST['add'])){ //if the button 'add' on the form is pressed
        if (empty($_POST['choice'])){ //if the choice box is not checked, send an alert to select a territory
            $alert='<div class="alert alert-danger alert-dismissible fade show" role="alert">Select at least one Territory, please !</div>';
        }
        else{
            $year=$_POST['year'];//reclaim the year
            $choice=$_POST['choice'];//reclaim the selected rows
            for($i=0;$i<count($choice);$i++){//browse the selected rows
                $choice_id=idData('territory');//get the id of selected row
                $choice_field_id=getWhere('territory','field_id',"id=$choice[$i]",'id')[0];//get the field_id of the selected row
                $choice_burrow_nb=getWhere('territory','burrow_nb',"id=$choice[$i]",'id')[0];
                $where="year=$current_year AND field_id='$choice_field_id'";
                $field_id_thisyear=getWhereDistinct('territory','field_id',$where);//get the array of field_id where the year corresponds to the current year and the field_id correspods to the one in the slected row
                if (empty($choice_burrow_nb)){//if no burrow_nb entered, fill with 'NULL'
                    $choice_burrow_nb='NULL';
                }
                $choice_aspect=getWhere('territory','aspect',"id=$choice[$i]",'id')[0];//get from the database the aspect where id is equal to the id of the selected row
                if (empty($choice_aspect)){
                    $choice_aspect='NULL';
                }
                $choice_surface=getWhere('territory','surface',"id=$choice[$i]",'id')[0];
                if (empty($choice_surface)){
                    $choice_surface='NULL';
                }
                $choice_vegetation=getWhere('territory','vegetation',"id=$choice[$i]",'id')[0];
                if (empty($choice_vegetation)){
                    $choice_vegetation='NULL';
                }
                $choice_snowmelt_date=getWhere('territory','snowmelt_date',"id=$choice[$i]",'id')[0];
                if (empty($choice_snowmelt_data)){
                    $choice_snowmelt_date='NULL';
                }
                $choice_comment=getWhere('territory','comment',"id=$choice[$i]",'id')[0];
                if (empty($choice_comment)){
                    $choice_comment='NULL';
                }
                $choice_latitude=getWhere('territory','latitude',"id=$choice[$i]",'id')[0];
                if (empty($choice_latitude)){
                    $choice_latitude='NULL';
                }
               $choice_longitude=getWhere('territory','longitude',"id=$choice[$i]",'id')[0];
               if (empty($choice_longitude)){
                   $choice_longitude='NULL';
               }
                $choice_altitude=getWhere('territory','altitude',"id=$choice[$i]",'id')[0];
                if (empty($choice_altitude)){
                    $choice_altitude='NULL';
                }
                $choice_study_site_id=getWhere('territory','study_site_id',"id=$choice[$i]",'id')[0];
                if (in_array($choice_field_id,$field_id_thisyear)){//if the field_id already exists in the array of field_id of the current year, send an alert that it exists
                    
                    $alert="<div class='alert alert-danger' role='alert'>Already existing in this year ! </div>";
                }
                else{ //add the data entered in the database and send an alert that it has been added wth success
                    $value="$choice_id,'$choice_field_id',$choice_burrow_nb,$choice_aspect,$choice_surface,$choice_vegetation,$choice_snowmelt_date,'$choice_comment',$choice_study_site_id,$year,'$choice_latitude','$choice_longitude','$choice_altitude'";
                    add('territory',$value);
                    $alert="<div class='alert alert-success alert-dismissible fade show' role='alert'>Success ! Territory added to $year</div>";
                }
                
            }
        }
    }
    
    //$last_year=2018;
    $study_site_choose=$_GET['study_site'];
    //$study_site_choose=2;
    $id=getWhere('territory','id',"year=$last_year AND study_site_id=$study_site_choose",'field_id');
    $join="territory JOIN study_site ON study_site.id=territory.study_site_id WHERE territory.year=$last_year AND territory.study_site_id=$study_site_choose ORDER BY territory.field_id";// Join condition
    $field_id=getJoin('territory','field_id',$join);
    $burrow_nb=getJoin('territory','burrow_nb',$join);
    $aspect=getJoin('territory','aspect',$join);
    $surface=getJoin('territory','surface',$join);
    $vegetation=getJoin('territory','vegetation',$join);
    $snowmelt_date=getJoin('territory','snowmelt_date',$join);
    $comment=getJoin('territory','comment',$join);
    $latitude=getJoin('territory','latitude',$join);
    $longitude=getJoin('territory','longitude',$join);
    $altitude=getJoin('territory','altitude',$join);
    $study_site_id=getJoin('territory','study_site_id',$join);
    $study_site_all=get('study_site','id');
    $study_territory=array();
    
    $id_thisyear=getWhere('territory','id',"year=$current_year AND study_site_id=$study_site_choose",'field_id');
    $join_thisyear="territory JOIN study_site ON study_site.id=territory.study_site_id WHERE territory.year=$current_year AND territory.study_site_id=$study_site_choose ORDER BY territory.field_id";// Join condition
    $field_id_thisyear=getJoin('territory','field_id',$join_thisyear);
    $burrow_nb_thisyear=getJoin('territory','burrow_nb',$join_thisyear);
    $aspect_thisyear=getJoin('territory','aspect',$join_thisyear);
    $surface_thisyear=getJoin('territory','surface',$join_thisyear);
    $vegetation_thisyear=getJoin('territory','vegetation',$join_thisyear);
    $snowmelt_date_thisyear=getJoin('territory','snowmelt_date',$join_thisyear);
    $comment_thisyear=getJoin('territory','comment',$join_thisyear);
    $latitude_thisyear=getJoin('territory','latitude',$join_thisyear);
    $longitude_thisyear=getJoin('territory','longitude',$join_thisyear);
    $altitude_thisyear=getJoin('territory','altitude',$join_thisyear);
    $study_site_id_thisyear=getJoin('territory','study_site_id',$join_thisyear);
    
    for ($i=0;$i<count($study_site_all);$i++){
        $study_territory[$study_site_all[$i]]=getWhere('study_site','name',"id=$study_site_all[$i]",'id')[0];//Take the correct study site name following the study site id
    }
?>

