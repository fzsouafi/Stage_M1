
<div style="background: #FDFEFE;">
  <h1> Year Form </h1>
</div>
<div style="background: #FDFEFE;">
   <br> 
  <h5> This form allows (if needed) to add previous years if they aren't in the database.<br> <br></h5>
</div>
<form action="index.php?page=formYear" method="post">
  <div>
          <label for="name">Year</label>
              <input type="text" class="form-control" placeholder="Year" name="year" value=<?php
                      if (isset($_POST['year'])){
                          echo("'".$_POST['year']."'");
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

