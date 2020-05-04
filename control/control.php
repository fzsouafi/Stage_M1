<body>
    Page du controleur.
    <?php
        include ("../model/model.php");
        $year=$_POST['year'];
        $name=$_POST['name'];
        $value="$year,'$name'";
        add('color',$value);
    ?>
</body>
