<?php
print("<form action='$stay' method='post'>"); //This form allows us to add a new sampletype who doesn't exist in the database
?>
    <div>
        <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name" value=<?php
                    if (isset($_POST['name'])){
                        echo("'".$_POST['name']."'");
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
        <input type="submit" class="btn btn-success" value="add" name="add" method="post">
    </div>
</form>

