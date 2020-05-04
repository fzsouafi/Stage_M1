<?php
    include("controlSampleType.php");//use the controlSampleType for adding a new sampleType to the database
    $id=get("sample_type","id","order_display");//get the id from the database
    $name=get("sample_type","name","order_display");
    $comment=getOrder("sample_type","comment","order_display");
?>
