<!-- Display for the multiform use -->

<div style='background: #ddf0f0;'>
    <h1>Multiform</h1>
        <h4>This multiform allow you to fill in all the before field forms for the year of your choise. At the end of each form page you’ll find « previous » or « next » to move to the previous or next form. <br>
        </h4>
        <h4>The form will be complete in this order : choose the year → study site / terrories → handlers → protocoles → sample type → storage → color <br>
        </h4>
        <h4>PS : if you want to add a new year please use the separate form, you can find it on the before field page.</h4><br>
</div>
<?php
    if ($_GET['page']=='formChooseYear'){ //Choose the good parameter to display the right progress bar
        $progression='5';
        $page='Year';
    }
    elseif ($_GET['page']=='formAddStudySite'){
            $progression='15';
            $page='StudySite/Territory';
            }
    elseif ($_GET['page']=='formAddHandlerYear'){
            $progression='29';
            $page='Handler';
            }
    elseif ($_GET['page']=='formProtocol'){
            $progression='43';
            $page='Protocol';
    }
    elseif ($_GET['page']=='formAddSampleType'){
            $progression='58';
            $page='SampleType';
    }
    elseif ($_GET['page']=='formAddStorage'){
            $progression='72';
            $page='Storage';
    }
    elseif ($_GET['page']=='formColor'){
            $progression='86';
            $page='Color';
    }
    ?>

<div class="progress">
<?php
    print("<div class='progress-bar progress-bar-striped bg-info progress-bar-animated' role='progressbar' aria-valuenow='$progression' aria-valuemin='0' aria-valuemax='100' style='width: $progression%'>$page</div>"); //Display the progress bar
    ?>
</div>

