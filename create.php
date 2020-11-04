<?php
include "inc/header.php";
include "database.php";
include "config.php";
?>

<?php

$db = new Database();
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db->link,$_POST['name']); // mysqli_real_escape_string ব্যবহার করলে script চালাতে পারবে না mysqli_real_escape_string দুইটা প্যরামিটার নেয়
    $email = mysqli_real_escape_string($db->link,$_POST['email']); 
    $skill = mysqli_real_escape_string($db->link,$_POST['skill']); 
    if ($name =='' || $email == '' || $skill == '') {
        $error = "Field Must Not Be Empty!!";
    } else {
        $query = "INSERT INTO user_data(name,email,skill) VALUES('$name','$email','$skill')";
        $create = $db->insert($query);
    }
}

?>
<?php

if (isset($error)) {
    echo "<span style='color:red'>" .$error."</span>";
}
?>


<main role="main" class="flex-shrink-0" style="margin-top: 5%;">

  <div class="container">

   <div class="row">
       <div class="col-md-12">
            <form action="create.php" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                <small id="emailHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Skill</label>
                <input type="text" name="skill" class="form-control" id="exampleInputPassword1" placeholder="">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-primary">Cancel</button>
            </form>

</div>
   </div>
  </div>
</main>

<a type="button" href="index.php">Go Back</a>

<?php

include "inc/footer.php";
?>
