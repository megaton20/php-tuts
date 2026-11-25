<?php
include('config/db.php');

$result = mysqli_query($conn, 'SELECT * FROM cookies');
if (!$result) die('Query error: ' . mysqli_error($conn));

$cookies = mysqli_fetch_all($result, MYSQLI_ASSOC);
$pageTitle = 'All Cookies';

?>

<?php include('template/head.php'); ?>

<?php include('partials/nav.php'); ?>

<div class="container">
    <h1>All Cookies</h1>

    <div class="row">
        <?php foreach ($cookies as $cookie) : ?>
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">
                            <?php echo htmlspecialchars($cookie['name']); ?>
                        </span>
                        <p><?php echo htmlspecialchars($cookie['discription']); ?></p>
                    </div>
                    <div class="card-action">
                        <a href="details.php?id=<?php echo (int) $cookie['id']; ?>">Read more</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include('template/footer.php'); ?>
<