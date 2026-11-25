<?php 

 include('config/db.php');


    $errors = ['ingridient'=>'', 'name' =>'', 'description' =>''];

    $name = '';
    $ingridient = '';
    $description = '';



        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $ingridient = $_POST['ingridient'];
            $description = $_POST['description'];

            if (empty($_POST['name']) ) {
                $errors["name"]= "please enter name";
            }

            if (empty($_POST['description']) ) {
                $errors["description"]= "please enter description";
            }

            if (empty($_POST['ingridient']) ) {
                $errors["ingridient"]= "please enter ingridient";
            }
           

        // all items present

        if (!array_filter($errors)) {
          $name =   mysqli_real_escape_string($conn, $_POST['name']);
          $description =   mysqli_real_escape_string($conn, $_POST['description']);
          $ingridient =  mysqli_real_escape_string($conn, $_POST['ingridient']);


          $sql = "INSERT INTO cookies (name, discription, ingridient)
          VALUES ('$name', '$description', '$ingridient')";
        }

        if(mysqli_query($conn, $sql)){
            echo 'Qeury done';
        }else{
            echo 'Query error: '. mysqli_error($conn);
        }
}

?>


<?php include('template/head.php')?>
<?php include('partials/nav.php')?>


<div class="my-center mt-60">
  

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

        <p class="text-danger"> <?php echo $errors['name'] ?> </p> <br>
        <input class="my-input" type="text" placeholder="enter cookie name" name="name" value= "<?php echo htmlspecialchars($name) ?>"> <br>
        <p class="text-danger"> <?php echo $errors['description'] ?> </p> <br>
        <input class="my-input" type="text" placeholder="enter Description" name="description" value= "<?php echo htmlspecialchars($description) ?>"> <br>
        
        <p class="text-danger"> <?php echo $errors['ingridient'] ?> </p>  <br>
        <input class="my-input" type="text" placeholder="enter ingridient" name="ingridient" value= "<?php echo htmlspecialchars($ingridient) ?>"> <br>

        <input class="my-input" type="submit" value="submit" name="submit">
        
    </form>
</div>

<?php include('template/footer.php')?>

</html>
