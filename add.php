<?php
include('config/db.php');

$errors = ['name' => '', 'description' => '', 'ingridient' => ''];
$name = $description = $ingridient = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name        = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $ingridient  = trim($_POST['ingridient'] ?? '');

    if ($name === '')        $errors['name']        = 'Please enter name';
    if ($description === '') $errors['description'] = 'Please enter description';
    if ($ingridient === '')  $errors['ingridient']  = 'Please enter ingredients';

    if (!array_filter($errors)) {
        $name        = mysqli_real_escape_string($conn, $name);
        $description = mysqli_real_escape_string($conn, $description);
        $ingridient  = mysqli_real_escape_string($conn, $ingridient);

        $sql = "INSERT INTO cookies (name, description, ingridient)
                VALUES ('$name', '$description', '$ingridient')";

        if (mysqli_query($conn, $sql)) {
            header('Location: index.php');
            exit;
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    }
}

$pageTitle = 'Add Cookie';
?>
<!DOCTYPE html>
<html lang="en">

<?php include('template/head.php'); ?>
<body>

<?php include('partials/nav.php'); ?>

<div class="container">
    <h1>Add Cookie</h1>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <div class="input-field">
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
            <label for="name" class="<?php echo $name ? 'active' : ''; ?>">Cookie name</label>
            <span class="red-text"><?php echo $errors['name']; ?></span>
        </div>

        <div class="input-field">
            <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($description); ?>">
            <label for="description" class="<?php echo $description ? 'active' : ''; ?>">Description</label>
            <span class="red-text"><?php echo $errors['description']; ?></span>
        </div>

        <div class="input-field">
            <input type="text" id="ingridient" name="ingridient" value="<?php echo htmlspecialchars($ingridient); ?>">
            <label for="ingridient" class="<?php echo $ingridient ? 'active' : ''; ?>">Ingredients</label>
            <span class="red-text"><?php echo $errors['ingridient']; ?></span>
        </div>

        <button class="btn waves-effect waves-light deep-orange" type="submit">
            Submit <i class="fa-solid fa-paper-plane"></i>
        </button>
    </form>
</div>

<?php include('template/footer.php'); ?>
</body>
</html>