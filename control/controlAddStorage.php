<?php
    include("controlStorage.php");//use the controlStorage for adding a new storage to the database
    $id=get("storage","id","id");// get the id from the sotage table in the database
    $type=get("storage","name","id");
    $position=get("storage","position","id");
    $field_id=get("storage","field_id","id");
    $comment=getOrder("storage","comment","order_display");
?>
