<?php $current = basename($_SERVER['PHP_SELF']); ?>

<nav class="deep-orange">
    <div class="nav-wrapper container">
        <a href="index.php" class="brand-logo">
            <i class="fa-solid fa-cookie-bite"></i> Pompus
        </a>

        <a href="#" data-target="mobile-nav" class="sidenav-trigger">
            <i class="fa-solid fa-bars"></i>
        </a>

        <ul class="right hide-on-med-and-down">
            <li>
                <a href="index.php" <?php echo $current === 'index.php' ? 'aria-current="page"' : ''; ?>>
                    Home
                </a>
            </li>
            <li><a href="add.php">Add Cookie</a></li>
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-nav">
    <li><a href="index.php">Home</a></li>
    <li><a href="add.php">Add Cookie</a></li>
</ul>