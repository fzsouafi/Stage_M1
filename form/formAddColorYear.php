<body>

<!-- The code of multiform-->
<?php
if ($_GET['multiform']==true){
    $next="index.php?page=main_page&amp;multiform=end";
    $previous="index.php?page=formAddStorage&amp;year=$current_year&amp;multiform=true";
    $stay="index.php?page=formColor&amp;year=$current_year&amp;multiform=true";
}
else{
    $stay="index.php?page=formColor&amp;year=$current_year";
}
?>

<!-- This is the homepage of color, which you can add the color chosen non exist to a new year, and the table of current year and previous year.-->

<div style="background: #FDFEFE;">
  <h1> Color Form </h1>
</div>

<div style="background: #FDFEFE;">

<h4> <br><b> STEP 1 :</b></br> <br>Choose the ear tag colors you want to keep for the year <?php print($current_year); ?>. For this, tick the boxes corresponding to the colors you want to keep in the last column of the table. Once done, click on « Add ear tag colors to <?php print($current_year); ?>.</br></h4>

</div>
</div>

<!-- The table of prevoius year-->
<div>
<div>
        <table id="table" class="table table-hover table-dark table-bordered" data-page-length='25'>
        <?php
        print("<form action='index.php?page=formColor&amp;year=$current_year' method='post'>");
        ?>
            <thead>
                <tr>
                    
                    <th>Name</th>
                    <th>Choice</th>

                </tr>
            </thead>
            <tbody>
                    <?php
                    for ($i=0;$i<count($id);$i++){
                        echo('<tr><td>'.$name[$i].'</td><td><input type="checkbox" name="choice[]" value="'.$id[$i].'">Add to ear tag colors to '.$current_year.'</td><tr>');
                    }//the gain of value of table
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
        <div>
            <input type="submit" class="btn btn-success btn-lg btn-block" value="Add color to <?php print($current_year); ?> " name="add" method="post">
        </div>
</form>

</body>

<!-- The code of the color form page-->

<div class="modal fade bd-example-modal-xl" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="addModalLabel">
                <strong>Add New Value</strong>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
                &times;
            </button>
        </div>
            <?php
                include("formColor.php");
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="background: #FDFEFE;">
 <h4> <br><b> STEP 2 :</b></br> <br>In the grey table below,  you find all the ear tag colors now present in the database for <?php print($current_year); ?>. If you need to add other ear tag colors,  click on « Add a new ear tag color to <?php print($current_year); ?> ».</br></h4>

</div>

<!-- The table of current year-->
<div>
<table id="table_id" class="table table-active table-hover table-bordered" data-page-length='25'>
<form action="index.php?page=formColor" method="post">
    <thead>
        <tr>
            
            <th>Name</th>

        </tr>
    </thead>
    <tbody>
            <?php
            for ($i=0;$i<count($id_thisyear);$i++){
                echo('<tr><td>'.$name_thisyear[$i].'</td>');
            }//the gain of value of table
            ?>
    </tbody>
</form>
</table>
</div> 
<div>
    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#addModal">Add new color</button>
<br>
</div>

<!-- The code of multiform: the button previous and End-->
<?php
if ($_GET['multiform']==true){
    print("<div class='clearfix'><button type='button' class='btn btn-warning btn-lg float-left'><a href='$previous'>Previous</button><button type='button' class='btn btn-danger btn-lg float-right'><a href='$next'>End</button></div>");
}
?>
