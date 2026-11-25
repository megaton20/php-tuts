<?php 
    $errors = [];
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordTwo = $_POST['password-2'];


            if (empty($_POST['email']) || empty($_POST['password'])) {
                $errors[]= "please enter credentials";
            }
            // echo $_POST['email'];
        }

?>
<!DOCTYPE html>
<html lang="en">

<?php include('template/head.php')?>
<?php include('partials/nav.php')?>


<?php if (count($errors) > 0) : ?>

   <?php foreach($errors as $error): ?>
    <p class="text-danger"><?php echo $error ?></p>
   <?php endforeach ?>

<?php endif ?>


<div class="my-center mt-60">

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input class="my-input" type="email" placeholder="enter email" name="email"> <br>
        <input class="my-input" type="password" name="password" placeholder="enter password"><br>
        <input class="my-input" type="password" name="password-2" placeholder="enter password"><br>
        <input class="my-input" type="submit" value="submit" name="submit">
        
        <p>have an account? <a href="login.php">Login now</a></p>
    </form>
</div>

<?php include('template/footer.php')?>

</html>