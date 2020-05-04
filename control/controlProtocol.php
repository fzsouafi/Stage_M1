<?php
   include("controlProtocolFile.php");//Use controlProtocolFile to add a new protocol to the database
    $id=getOrder('protocol','id','id');//get from the database the id of the table protocol
    $name=getOrder('protocol','name','id');
    $type=getOrder('protocol','type','id');
    $comment=getOrder('protocol','comment','id');
    $protocol_file_id=getOrder('protocol','protocol_file_id','id');
    $filename=getOrder('protocol_files','filename','id');
    $join="protocol JOIN protocol_file ON protocol.protocol_file_id=protocol_file.id"
?>
