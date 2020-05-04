<body>
    <?php
        $array_new_year=get('year','year');//get the year from the table year from the database
        if (in_array(date('Y'),$array_new_year)){//if it exists in the array: nothing
        }
        else{//else add to the database
            $new_year=date('Y');
            $value="$new_year,''";
            add('year',$value);
        }

        if (isset($_POST['add'])){// If the button 'add' on the form is pressed
            if (empty($_POST['year'])){// If no 'year' is entered send an alert
                $alert="<div class='alert alert-danger' role='alert'>Failed ! Add a year, please.</div>";
            }
            elseif (in_array($_POST['year'],$array_new_year)){//If the year already exists in the database, send an alert
                $alert="<div class='alert alert-danger' role='alert'>Already existing ! Add a NEW year, please.</div>";
            }
            else{
                $year=$_POST['year'];
                $comment=$_POST['comment'];
                $value="$year,'$comment'";
                add('year',$value);
                $alert="<div class='alert alert-success' role='alert'>Success! $year added.</div>";
            }
        }
    ?>
</body>
