<?php
include "inc/header.php";
include "database.php";
include "config.php";
?>

<?php
$id = $_GET['id'];
$db = new Database();
$query = "SELECT * FROM user_data WHERE id=$id";
$getData = $db->select($query)->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db->link,$_POST['name']); // mysqli_real_escape_string ব্যবহার করলে script চালাতে পারবে না mysqli_real_escape_string দুইটা প্যরামিটার নেয়
    $email = mysqli_real_escape_string($db->link,$_POST['email']); 
    $skill = mysqli_real_escape_string($db->link,$_POST['skill']); 
    if ($name =='' || $email == '' || $skill == '') {
        $error = "Field Must Not Be Empty!!";
    } else {
        $query = "
        UPDATE user_data SET name='$name',email='$email',skill='$skill'
        WHERE id =$id
        ";
        $update = $db->update($query);
    }
}

?>



<main role="main" class="flex-shrink-0" style="margin-top: 5%;">

  <div class="container">

   <div class="row">
       <div class="col-md-12">
        <?php

          if (isset($error)) {
              echo "<span style='color:red'>" .$error."</span>";
          }
          ?>
            <form action="update.php?id=<?php echo $id;?>" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $getData['name']?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                <small id="emailHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $getData['email']?>" id="exampleInputPassword1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Skill</label>
                <input type="text" name="skill" class="form-control" value="<?php echo $getData['skill']?>" id="exampleInputPassword1" placeholder="">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <a href="index.php" type="button" class="btn btn-primary">Cancel</a>
            </form>

</div>
   </div>
  </div>
</main>

<a type="button" href="index.php">Go Back</a>

<?php

include "inc/footer.php";
?>
