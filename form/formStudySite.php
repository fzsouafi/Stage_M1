<?php
print("<form action='$stay' method='post'>"); //This form allows us to add a new studysite who doesn't exist in the database
?>
    <div>
        <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name" value=<?php
                    if (isset($_POST['name'])){
                        echo("'".$_POST['name']."'");
                    }
    ?>></div>

    <div id="map">
        
        <br>
        <label for="map">Add a map</label><tr>
        <input type="file" id="map" name="map" >
    </div>

    <div>
        <br>
        <label for="latitude">Latitude</label>
            <input type="text" class="form-control" placeholder="Latitude" name="latitude" value=<?php
                    if (isset($_POST['latitude'])){
                        echo("'".$_POST['latitude']."'");
                    }
    ?>></div>
    <div>
        <label for="longitude">Longitude</label>
            <input type="text" class="form-control" placeholder="Longitude" name="longitude" value=<?php
                    if (isset($_POST['longitude'])){
                        echo("'".$_POST['longitude']."'");
                    }
    ?>></div>

    <div>
        <label for="altitude">Altitude</label>
            <input type="text" class="form-control" placeholder="Altitude" name="altitude" value=<?php
                    if (isset($_POST['altitude'])){
                        echo("'".$_POST['altitude']."'");
                    }
    ?>></div>
    <div>
        <label for="comment">Comment</label>
        <textarea class="form-control" placeholder="Add a comment here" name="comment" rows=4 cols=40><?php
            if (isset($_POST['comment'])){
                echo($_POST['comment']);
            }
        ?></textarea>
    </div>

    <div>
        <input type="submit" class="btn btn-success" value="add" name="add_study_site" method="post">
    </div>
</form>
