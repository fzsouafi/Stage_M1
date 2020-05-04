<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
<body>
<?php
if ($_GET['multiform']==true){ // If the form is used in 'Multiform'
    $current_year=$_GET['year'];// Get the current year
    $next="index.php?page=formAddStorage&amp;year=$current_year&amp;multiform=true";//Keep the next link page
    $previous="index.php?page=formProtocol&amp;year=$current_year&amp;multiform=true";//Keep the previous link page
    $stay="index.php?page=formAddSampleType&amp;year=$current_year&amp;multiform=true";//Keep the link if we stay in the page
}
else{
    $stay="index.php?page=formAddSampleType&amp;year=$current_year";
}
?>
<div style="background: #FDFEFE;">
  <h1> SampleType Form </h1>
</div>
<div>
    <table id="table_id" class="table table-hover table-dark table-bordered" data-page-length='25'>
    <thead>
        <tr>
            <th>name</th>
            <th>comment</th>
        </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0;$i<count($id);$i++){ // to display the table rows
        echo('<tr><td>'.$name[$i].'</td><td>'.$comment[$i].'</td></tr>'); // Display of an handler with the checkbox to add it in a year
    }
    ?>
    </tbody>
    </table>
</div>
<div>
    <h4><br> If the type of samples is not yet present in the database:<br></h4>
</div>
<div>
    <button type="button" class="btn-success btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">add new Sample Type</button>
    <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong>New Sample Type</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
                include("formSampleType.php"); //using the SampleType form to add a new sample type to a year
                ?>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
if ($_GET['multiform']==true){ //If we are in multiform mode then we display the buttons
    print("<div class='clearfix'><button type='button' class='btn btn-warning btn-lg float-left'><a href='$previous'>Previous</button><button type='button' class='btn btn-danger btn-lg float-right'><a href='$next'>Next</button></div>");
}
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

