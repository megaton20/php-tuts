<?php 

include('config/db.php');

if (!isset($_GET['id']) || preg_match('/^[0-9a-f\-]{36}$/i', $_GET['id'])) {
    die('invalid url for id');
}

$id = $_GET['id'];
$sql = "SELECT * FROM cookies WHERE id  = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 's', $id); 
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$cookie = mysqli_fetch_assoc($result);

if (!$cookie) {
    die('no detail found for this cookie');
}
// $result = mysqli_query($conn, $sql);


?>


 <?php include('template/head.php') ?>
 <?php include('partials/nav.php')?>


 <div class="container">
    <br>
    <br>
     <a href="index.php">home</a>

     <div class="my-center">

         <div>
            <h1><?php echo htmlspecialchars($cookie['name'])?></h1>
         <p><?php echo htmlspecialchars($cookie['discription'])?></p>
         </div>
    </div>
</div>

 <?php include('template/footer.php') ?>