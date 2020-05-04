<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
<body>
<?php
    if ($_GET['multiform']==true){ //if the form is used in 'Multiform'
        $next="index.php?page=formProtocol&amp;year=$current_year&amp;multiform=true";//Keep the next link page
        $previous="index.php?page=formAddStudySite&amp;year=$current_year&amp;multiform=true";//Keep the previous link page
        $stay="index.php?page=formAddHandlerYear&amp;year=$current_year&amp;multiform=true";//Keep the link if we stay in the page
    }
    else{ //if the form is used separatly
        $stay="index.php?page=formAddHandlerYear&amp;year=$current_year";//Keep the link if we stay in the page
    }
    ?>

<div style="background: #FDFEFE;">
  <h1> Handler Form </h1>
</div>
<div style="background: #FDFEFE;">
  <h4> <br> On this page you’ll be able to fill up the handler and handler year table for year <?php
      print($current_year);
      ?>
        in 2 steps. <br></h4>
  <h4> <br><b>STEP 1 :</b></br><br>Choose the handlers you want to keep for this year <?php print($current_year); ?>. For this, check that the information on the handlers you want to keep are correct (if not add this handler in STEP 2), then tick the boxes corresponding to the handlers you want to keep in the last column of the table. Once done, click on « Add handler to <?php print($current_year); ?> ».</br></h4>
</div>
</div>
<div>
<div>
    <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong>New Handler</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
                include("formHandler.php"); //using the Handler form to add a new handler to a year
                ?>
          </div>
        </div>
      </div>
    </div>
</div>
<div>
    <table id="table" class="table table-hover table-dark table-bordered" data-page-length='25'>
    <?php
    print("<form action='$stay' method='post'>"); //to display the table of the previous year (year selected -1)
    ?>
    <thead>
        <tr>
            <th>id</th>
            <th>last_name</th>
            <th>first_name</th>
            <th>email</th>
            <th>status</th>
            <th>comment</th>
            <th>choice</th>
        </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0;$i<count($id);$i++){ // to display the table rows
        echo('<tr><td>'.$id[$i].'</td><td>'.$last_name[$i].'</td><td>'.$first_name[$i].'</td><td>'.$email[$i].'</td><td>'.$status[$i].'</td><td>'.$comment[$i].'</td><td><input type="checkbox" name="choice[]" value="'.$id[$i].'">Add handler to '.$current_year); // Display of an handler with the checkbox to add it in a year
    }
    ?>
    </tbody>
    </table>
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
</div>
<select class="custom-select" id="disabledSelect" style="display:none" name="year"> <!-- a hidden form used to keep the year selected -->
        <?php
            print("<option type='hidden' value='$current_year' selected='selected'>$current_year</option>");
            ?>
</select>
</div>
    <?php
        print("<input type='submit' class='btn btn-success btn-lg btn-block' value='add handler to $current_year' name='add' method='post'>");
        ?>

</form>

<div style="background: #FDFEFE;">
   <br>  <br>
  <h4> <br><b>STEP 2 :</b></br>
    <br>In the grey table below,  you find all the handlers now present in the database for <?php print($current_year); ?>. If you need to add other handler click on the « add a new handler».<br></h4>
</div>

<div>
<table id="table_id" class="table table-active table-hover table-bordered" data-page-length='25'>
<?php
print("<form action='index.php?page=formAddHandlerYear&amp;year=$last_year' method='post'>");
?>
<thead>
    <tr>
        <th>id</th>
        <th>last_name</th>
        <th>first_name</th>
        <th>email</th>
        <th>status</th>
        <th>comment</th>

    </tr>
</thead>
<tbody>
<?php
for ($i=0;$i<count($id_thisyear);$i++){
    echo('<tr><td>'.$id_thisyear[$i].'</td><td>'.$last_name_thisyear[$i].'</td><td>'.$first_name_thisyear[$i].'</td><td>'.$email_thisyear[$i].'</td><td>'.$status_thisyear[$i].'</td><td>'.$comment_thisyear[$i].'</td>'); // Display of an handler with the checkbox to add it in a year
}
?>
</tbody>
</table>
</div>

<div>
    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">add new handler</button>
	   <br>  
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
