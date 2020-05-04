<?php
    include("controlStudySite.php");//use the controlStudySite for adding a new Study site to the database
    $current_year=intval($_GET['year']);//get the integer value of the current year from the string
    $last_year=$current_year-1;
    $id=get("study_site","id","id");//get the id from the study_site table of the database
    $name=get("study_site","name","id");
    $description=getOrder("study_site","description","id");////get the description from the study_site table of the database, ordered by the id
    $comment=getOrder("study_site","comment","id");
    $map=getOrder("study_site","map","id");
    $latitude=getOrder("study_site","latitude","id");
    $longitude=getOrder("study_site","longitude","id");
    $altitude=getOrder("study_site","altitude","id");
?>
