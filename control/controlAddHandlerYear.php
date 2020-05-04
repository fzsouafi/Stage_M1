  <?php
    include("controlHandler.php"); //use the controlHandler for adding a new handler to the database
    //$array_year=getDistinct('year','year');
    if (isset($_POST['add'])){ //if the button 'add' on the form is pressed
            if (empty($_POST['year'])){ //if the there is no year selected, send an alert
                $alert='<div class="alert alert-danger alert-dismissible fade show" role="alert">Select a year, please !</div>';
            }
            elseif (empty($_POST['choice'])){ //if the choice box is not checked, send an alert to select a handler
                $alert='<div class="alert alert-danger alert-dismissible fade show" role="alert">Select at least one handler, please !</div>';
            }
            
            else{
                $year=$_POST['year'];
                $choice=$_POST['choice'];
                for($i=0;$i<count($choice);$i++){ //Browse the table rows
                    if (in_array($choice[$i],$id_thisyear)){ //if the handler already exists in the current year, send an alert
                        $alert="<div class='alert alert-danger' role='alert'>Already existing in this year ! Choose anothor one </div>";
                    }
                    else{ //else add to the database the handler selected in the year and send an alert that it has been added with success
                        $value="$choice[$i],$year,'NULL'";
                        add('handler_year',$value);
                    $alert="<div class='alert alert-success alert-dismissible fade show' role='alert'>Success ! Handlers added to $year</div>";
                    }
                    
                }
            }
        }
    $current_year=intval($_GET['year']); //reclaim the integer value from the string
    $last_year=$current_year-1; // get the previous year
    $id=getWhere('handler_year','handler_id',"year='$last_year'",'handler_id');
    $join="handler JOIN handler_year ON handler.id=handler_year.handler_id WHERE handler_year.year=$last_year ORDER BY handler.last_name";// Join condition
    $last_name=getJoin('handler','last_name',$join); // get the last_name for the previous year by joining the handler table and the handler_year table
    $first_name=getJoin('handler','first_name',$join);
    $status=getJoin('handler','status',$join);
    $comment=getJoin('handler','comment',$join);
    $provider_name=getJoin('handler','provider_name',$join);
    $email=getJoin('handler','email',$join);
   
      $id_thisyear=getWhere('handler_year','handler_id',"year='$current_year'",'handler_id'); //get the id of the current year
      $join_thisyear="handler JOIN handler_year ON handler.id=handler_year.handler_id WHERE handler_year.year=$current_year ORDER BY handler_year.handler_id";// Join condition
      $last_name_thisyear=getJoin('handler','last_name',$join_thisyear); // get the last_name for the current year by joining the handler table and the handler_year table
      $first_name_thisyear=getJoin('handler','first_name',$join_thisyear);
      $status_thisyear=getJoin('handler','status',$join_thisyear);
      $comment_thisyear=getJoin('handler','comment',$join_thisyear);
      $provider_name_thisyear=getJoin('handler','provider_name',$join_thisyear);
      $email_thisyear=getJoin('handler','email',$join_thisyear);
      ?>
