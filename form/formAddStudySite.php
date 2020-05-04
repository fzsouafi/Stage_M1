<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
<body>
<?php
if ($_GET['multiform']==true){//if the form is used in 'Multiform'
    $next="index.php?page=formAddHandlerYear&amp;year=$current_year&amp;multiform=true";//Keep the next link page
    $previous="index.php?page=formChooseColor&amp;multiform=true";//Keep the previous link page
    $stay="index.php?page=formAddStudySite&amp;year=$current_year&amp;multiform=true";//Keep the link if we stay in the page
}
else{//if the form is used separatly
    $stay="index.php?page=formAddStudySite&amp;year=$current_year";//Keep the link if we stay in the page
}
?>
<div style="background: #FDFEFE;">
  <h1> Study Site and Territory Site Form </h1>
</div>
<div style="background: #FDFEFE;">
  <h4> <br><b>STEP 1 :</b> All the study sites present in the database are in the table below. If you need to add a new one, click on  “Add a new study site”. <br></h4>
</div>


<div>
    <table id="table_id" class="table table-hover table-dark table-bordered" data-page-length='25'>
    <thead>
        <tr>
            <th>name</th>
            <th>latitude</th>
            <th>longitude</th>
            <th>altitude</th>
            <th>map</th>
            <th>comment</th>
        </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0;$i<count($id);$i++){
        if ($_GET['multiform']==true){
            echo("<tr><td><a href='index.php?page=formAddStudySite&amp;study_site=$id[$i]&amp;year=$current_year&amp;multiform=true'>$name[$i]</a></td><td>$latitude[$i]</td><td>$longitude[$i]</td><td>$altitude[$i]</td><td>$map[$i]</td><td>$comment[$i]</td></tr>"); // Display of a study_site with the link to get the territory associated for multiform
        }
        else{
            echo("<tr><td><a href='index.php?page=formAddStudySite&amp;study_site=$id[$i]&amp;year=$current_year'>$name[$i]</a></td><td>$latitude[$i]</td><td>$longitude[$i]</td><td>$altitude[$i]</td><td>$map[$i]</td><td>$comment[$i]</td></tr>"); // Display of a study_site with the link to get the territory associated without multiform
        }
    }
    ?>
    </tbody>
    </table>
</div>
<div>
    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">add new Study site</button>
    <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New StudySite Type</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
                include("formStudySite.php");//using the StudySite form to add a new study site
                ?>
          </div>
        </div>
      </div>
    </div>
</div>

<div style="background: #FDFEFE;">
  <h4> <br><b>STEP 2 :</b> Click on the name of the study site you need to add territories for (in the table above).
</br></h4>
</div>

<div>
<?php
    if (isset($_GET['study_site'])){//If a study_site is already choose we display the territory associated
        include ("control/controlAddTerritoryYear.php");
        include ("form/formAddTerritoryYear.php");
    }
    ?>
</div>
<?php
    if ($_GET['multiform']==true){//If we are in multiform mode then we display the buttons
        print("<div class='clearfix'><button type='button' class='btn btn-warning btn-lg float-left'><a href='$previous'>Previous</button><button type='button' class='btn btn-danger btn-lg float-right'><a href='$next'>Next</button></div>");
    }
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
