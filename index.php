<?php 

        include('config/db.php');  

        $addSQL = 'SELECT * FROM cookies';
        $result = mysqli_query($conn, $addSQL);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $cookies = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


<?php include('template/head.php')?>
<?php include('partials/nav.php')?>

<div class="container">

    <h1>All Cookies</h1>
    
    <?php foreach($cookies as $cookie) :?>
    <div class="my-row">
    <div class="card">
        <a href="details.php?id=<?php echo $cookie['id'] ?>" class="card-head">
            <p> <?php echo(htmlspecialchars($cookie['name']))?></p>
        </a>
    
    </div>
    
    <?php endforeach ?>
    
    </div>
</div>


    <?php include('template/footer.php')?>

</html>