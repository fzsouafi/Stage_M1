<?php
    
    /*
     This file contains the information that make the link between the code and the database
     */
    include("../../php/lib/config.php");
    print("include");
    print($sql_details['type']);
    $server='pgsql:host=localhost;port=5432;dbname=marmota'; //Server with dataBase
    $user='marmota_rw'; //User to connect to DataBase
    $passWord='g8Z37vB4'; //Password for the user
    
    function connectDB(){ //Function that allow to connect to DataBase
        global $user, $passWord, $server;
        try {
            $conn=new PDO($server,$user,$passWord); //Create a PDO class object
            return $conn; //Return the connection object
        } catch (PDOException $e) {
        echo("Erreur !: " . $e->getMessage() . "<br/>"); //Display the error message if the PDO doesn't work
        exit();
        }
    }
    
    function add($table,$values){ //Function that add values in a table from the database
        $conn=connectDB();
        $query="INSERT INTO $table VALUES ($values)";
        //print($query);
        $conn->query($query);
    }
    
    function get($table,$col){ //Function that return the values of an argument in an table from the table
        $array=array();
        $conn=connectDB();
        $query="SELECT * FROM $table";
        foreach ($conn->query($query)as $row){
            array_push($array,$row[$col]);
        }
        return $array;
    }
    
    function getOrder($table,$col,$order){ //Function that return the values of an argument in an table from the table with a defined order
        $array=array();
        $conn=connectDB();
        $query="SELECT * FROM $table ORDER BY $order";
        foreach ($conn->query($query)as $row){
            array_push($array,$row[$col]);
        }
        return $array;
    }
    
    function getDistinct($table,$col){ //Function that return the values of an argument in an table from the table using SELECT DISTINCT
        $array=array();
        $conn=connectDB();
        $query="SELECT DISTINCT $col FROM $table";
        foreach ($conn->query($query)as $row){
            array_push($array,$row[$col]);
        }
        return $array;
    }
    
    function getWhere($table,$col,$where,$order){ //Function that return the values of an argument in an table from the table using WHERE and ORDER BY
        $array=array();
        $conn=connectDB();
        $query="SELECT $col FROM $table WHERE $where ORDER BY $order";
        //print($query);
        foreach ($conn->query($query)as $row){
            array_push($array,$row[$col]);
        }
        return $array;
    }

    function getWhereDistinct($table,$col,$where){ //Function that return the values of an argument in an table from the table using SELECT DISTINCT and WHERE
        $array=array();
        $conn=connectDB();
        $query="SELECT DISTINCT $col FROM $table WHERE $where";
        //print($query);
        foreach ($conn->query($query) as $row){
            //print_r($row);
            //print_r($col);

            array_push($array,$row[$col]);
        }
        return $array;
    }
    
    function getJoin($table,$col,$join){ //Function that return the values of an argument in an table from the table using JOIN
        $array=array();
        $conn=connectDB();
        $query="SELECT $table.$col FROM $join";
        foreach ($conn->query($query)as $row){
            array_push($array,$row[$col]);
        }
        return $array;
    }

    function getJoinFK($col,$tab1,$tab2,$key1,$key2){ //Function that return the values of an argument in an table from the table using JOIN and a Foreign key
        $array=array();
        $conn=connectDB();
        $query="SELECT $tab2.$col FROM $tab1 JOIN $tab2 ON $tab1.$key1 = $tab2.$key2";
        foreach ($conn->query($query)as $row){
            array_push($array,$row[$col]);
        }
        return $array;
    }    

    function update($table,$modify,$condition){ //Function that update a value in an a table following conditions, example of use : update("color","name='testmodif'","id=18")
        $conn=connectDB();
        $query="UPDATE $table SET $modify WHERE $condition"; //$table=table to modify, $modify=column to modify in database with the value, $condition=contition for modifying the database
        $conn->query($query);
    }

    function idData($table){ //Function that return the next id to insert in a table from the database
        $array=get($table,'id');
        $id=max($array)+1;
        return $id;
    }
    ?>
