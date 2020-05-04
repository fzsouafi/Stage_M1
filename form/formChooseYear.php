<?php
    $page_select=$_GET['page'];
    if ($page_select=="formAddHandlerYear"){
        $page_display="handlers";
    }
    elseif ($page_select=="formColor"){
        $page_display="ear tags color";
    }
    elseif ($page_select=="formAddStudySite"){
    $page_display="study site and territories";
    }
    ?>

<div>
<br>
<h4>Choose the year you want to enter <?php print($page_display); ?> for, by clicking on it in the table below :
</h4>
</div>
<div>
    <table id="table_id" class="table table-hover table-dark table-bordered" data-page-length='25'>
        <thead>
            <tr>
                
                <th>Year</th>
                <th>Comment</th>

            </tr>
        </thead>
        <tbody>
                <?php
                    $page_select=$_GET['page'];
                    for ($i=0;$i<count($array_year);$i++){
                        if ($_GET['multiform']==true){// Check in wich mode we are
                            echo("<tr><td><a href='index.php?page=formAddStudySite&amp;year=$array_year[$i]&amp;multiform=true'>$array_year[$i]</td><td>$comment[$i]</td></tr>");//Link to the next page in multiform mode
                        }
                        else{
                            echo("<tr><td><a href='index.php?page=$page_select&amp;year=$array_year[$i]'>$array_year[$i]</td><td>$comment[$i]</td></tr>");// Link to the form associated 
                        }
                    }
                ?>
        </tbody>
    </table>

</div>
