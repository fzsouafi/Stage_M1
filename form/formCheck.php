
<div style="background: #FDFEFE;">
  <h1> Capture edit Form (in progress) </h1>
</div>

<div style="background: #FDFEFE;">
  <h4> <br>On this page you’ll be able to check the data entered in the database and modify them if necessary. (IN PROGRESS : for now we can just see the files and the data attached, but not modify them) <br></h4>
  <h4> <br> <b>STEP 1 :</b>
You’ll find in the table below all the data sheet files. Click on the file name you want to check the data entered for. The file and the data will be displayed lower. <br><br> <b>Attention</b> It’s possible that a file doesn’t exist (dead link), <b>or </b>that a file don’t have any data linked <b>or </b> both.</h4>
</div>

<div>
    <table id="table_id" class="table table-hover table-dark table-bordered" data-page-length='25'>
    <thead>
        <tr>
            <th>id</th>
            <th>filename</th>
            <th>filesize</th>
            <th>web_path</th>
            <th>system_path</th>
        </tr>
    </thead>
        <tbody>
        <?php
            for ($i=0;$i<count($id);$i++){
                echo("<tr><td>$id[$i]</td><td><a href='index.php?page=formCheck&amp;file=$web_path[$i]'>$filename[$i]</a></td><td>$filesize[$i]</td><td>$web_path[$i]</td><td>$system_path[$i]</td></tr>");
            }
            ?>
        </tbody>
    </table>
</div>
<div>
<?php
    if (isset($_GET['file'])){
    $file=$_GET['file'];
    print($file);
        include("form/formPDF.php");
    }
    ?>
</div>
