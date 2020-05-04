<?php
    $color_name=getDistinct('color','name');//get a table of the different 'name' existing in the database
    $current_year=intval($_GET['year']);//get the current year
    if (isset ($_POST['add_color'])){
        if (empty($_POST['add_name'])){
            $alert="<div class='alert alert-danger' role='alert'>Failed ! Add a name, please.</div>";
        }//if you don't put name in the blank, there is the message 'please add a name'
        elseif (in_array($_POST['add_name'],$color_name)){
            $alert="<div class='alert alert-danger' role='alert'>Already existing ! Add a NEW color, please.</div>";
        }//if you add the same color in the same year, the message 'already existing! add a new color, please.
        else{
            $name=$_POST['add_name'];//reclaim color name
            $id_add=idData('color');//reclaim id of color
            $color_year=$current_year;
            $value="$id_add,'$color_year','$name'";
            add('color',$value);//add the entered data in the database
            $alert="<div class='alert alert-success alert-dismissible fade show' role='alert'>Success ! $name added to $current_year</div>";
        }
    }

    $name_thisyear=getWhere('color','name',"year =$current_year",'id');
    if (isset($_POST['add'])){
        if (empty($_POST['year'])){
            $alert='<div class="alert alert-danger alert-dismissible fade show" role="alert">Select a year, please !</div>';
        }//if you don't put year in the blank, there is the message 'Select a year, please!'
        elseif (empty($_POST['choice'])){
            $alert='<div class="alert alert-danger alert-dismissible fade show" role="alert">Select at least one color, please !</div>';
        }//if you didn't choose a value added to a year, there is the message 'select at least one color, please!
        else{
            $year=$current_year;
            $choice=$_POST['choice'];
            for($i=0;$i<count($choice);$i++){
                $choice_id=idData('color');
                $choice_name=getWhere('color','name',"id=$choice[$i]",'id')[0];//get the name of the selected row
                if (in_array($choice_name,$name_thisyear)){
                    $alert="<div class='alert alert-danger' role='alert'>Already existing in this year ! </div>"; //if the color you choose has already existed in the same year, the message 'Already existing in this year !' shows.
                }
                else{
                    $value="$choice_id,$year,'$choice_name'";
                    add('color',$value);
                $alert="<div class='alert alert-success alert-dismissible fade show' role='alert'>Success ! Colors added to $year</div>";
                }//add the color selected to the year
            }
        }
    }
    $last_year=$current_year-1;
    $id=getWhere('color','id',"year=$last_year",'name');
    $name=getWhere('color','name',"year =$last_year",'name');
    $name_thisyear=getWhere('color','name',"year =$current_year",'name');
    $id_thisyear=getWhere('color','id',"year=$current_year",'name');
    //if every previous conditions are satisfaited, the value will be added in the database


?>
