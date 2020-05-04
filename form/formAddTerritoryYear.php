<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
<body>
<?php
    $current_study_site=$_GET['study_site'];
    $current_study_site_name=getWhere('study_site','name',"id=$current_study_site",'name');
if ($_GET['multiform']==true){// If the form is used in 'Multiform'
    $stay_territory="index.php?page=formAddStudySite&amp;year=$current_year&amp;study_site=$current_study_site&amp;multiform=true";//Keep the link if we stay in the page and keep the study site choosen
}
else{
    $stay_territory="index.php?page=formAddStudySite&amp;year=$current_year&amp;study_site=$current_study_site";
}
?>
<div style="background: #FDFEFE;">
  <h4> <br><b>STEP 3 :</b>STEP 3 : In the black table below, you find all the territories present in the database for <?php print($current_study_site_name[0]); ?> in <?php print($current_year); ?>. Choose the territories you want to keep for <?php print($current_study_site_name[0]); ?> in <?php print($current_year); ?>. For this, check that the information on the territories you want to keep are correct (if not add these territories in STEP 4), then tick the boxes corresponding to the territories you want to keep in the last column of the table. Once done, click on « Add territories to <?php print($current_study_site_name[0]); ?> in <?php print($current_year); ?> ».</br></h4>
</div>


<div>
    <div class="modal fade bd-example-modal-xl" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Territory</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
                include("formTerritory.php");//using the Territory form to add a new territory to a year
                ?>
          </div>
        </div>
      </div>
    </div>
</div>

<div>
<div>
    <table id="table_id" class="table table-hover table-dark table-bordered" data-page-length='25'>
    <?php
    print("<form action='$stay_territory' method='post'>");
    ?>
    <thead>
        <tr>
            <th>field_id</th>
            <th>burrow_nb</th>
            <th>aspect</th>
            <th>surface</th>
            <th>vegetation</th>
            <th>snowmelt_date</th>
            <th>comment</th>
            <th>study_site</th>
            <th>latitude</th>
            <th>longitude</th>
            <th>altitude</th>
            <th>choice</th>
        </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0;$i<count($id);$i++){
        echo('<tr><td>'.$field_id[$i].'</td><td>'.$burrow_nb[$i].'</td><td>'.$aspect[$i].'</td><td>'.$surface[$i].'</td><td>'.$vegetation[$i].'</td><td>'.$snowmelt_date[$i].'</td><td>'.$comment[$i].'</td><td>'.$study_territory[$study_site_id[$i]].'</td><td>'.$latitude[$i].'</td><td>'.$longitude[$i].'</td><td>'.$altitude[$i].'</td><td><input type="checkbox" name="choice[]" value="'.$id[$i].'">Add territories to '.$current_study_site_name[0].' in '.$current_year); // Display of an handler with the checkbox to add it in a year
    }
    ?>
    </tbody>
    </table>
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
</div>
<select class="custom-select" id="disabledSelect" style="display:none" name="year">
        <?php
            print("<option type='hidden' value='$current_year' selected='selected'>$current_year</option>");
            ?>
</select>
</div>

</div>
    <?php
        print("<input type='submit' class='btn btn-success btn-lg btn-block' value='add territory to $current_study_site_name[0] in $current_year' name='add' method='post'>");
        ?>

</form>

<div style="background: #FDFEFE;">
  <h4> <br><b>STEP 4 :</b>In the grey table below,  you find all the territories now present in the database for <?php print($current_study_site_name[0]); ?> in <?php print($current_year); ?>. If you need to add other territories click on « Add a new territory to <?php print($current_study_site_name[0]); ?> in <?php print($current_year); ?> ».
</br></h4>
</div>
<div>
<table id="table_id" class="table table-hover table-active table-bordered" data-page-length='25'>
<?php
print("<form action='index.php?page=formAddStudySite&amp;study_site=$study_site_choose&amp;year=$current_year' method='post'>");
?>
<thead>
    <tr>
        <th>field_id</th>
        <th>burrow_nb</th>
        <th>aspect</th>
        <th>surface</th>
        <th>vegetation</th>
        <th>snowmelt_date</th>
        <th>comment</th>
        <th>study_site</th>
        <th>latitude</th>
        <th>longitude</th>
        <th>altitude</th>
    </tr>
</thead>
<tbody>
<?php
for ($i=0;$i<count($id_thisyear);$i++){
    echo('<tr><td>'.$field_id_thisyear[$i].'</td><td>'.$burrow_nb_thisyear[$i].'</td><td>'.$aspect_thisyear[$i].'</td><td>'.$surface_thisyear[$i].'</td><td>'.$vegetation_thisyear[$i].'</td><td>'.$snowmelt_date_thisyear[$i].'</td><td>'.$comment_thisyear[$i].'</td><td>'.$study_territory[$study_site_id_thisyear[$i]].'</td><td>'.$latitude_thisyear[$i].'</td><td>'.$longitude_thisyear[$i].'</td><td>'.$altitude_thisyear[$i].'</td>'); // Display of an handler with the checkbox to add it in a year
}
?>
</tbody>
</table>
</div>

<div>
    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#exampleModal2">add new Territory to <?php print($current_study_site_name[0]); ?> in <?php print($current_year); ?></button>
<br>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
