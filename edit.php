<?php 

include('/config/db.php');

if (!isset($_GET['id']) || preg_match('/^[0-9a-f\-]{36}$/i', $_GET['id'])) {
    die('error getting page!');
}

$id = $_GET['id'];
$sql = 'SELECT * FROM cookies WHERE id = ? LIMIT 1';
$stmt = mysqli_prepare($conn, $sql);
mysqli_smpt_bind_param($stmt, 's', $id);
mysqli_stmpt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$cookie = mysqli_fetch_assoc($result);

if (!$cookie) {
    die('no cookie found');
}


$errors = ['name'=>'', 'discription'=>'', 'ingridient'=>''];
$name = $cookie['name'];
$discription = $cookie['discription'];
$ingridient = $cookie['ingridient'];

// if they is post request

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $discription = trim($_POST['discription'] ?? '');
    $ingridient = trim($_POST['ingridient'] ?? '');

    // check for empty field
    if($name == '') $errors['name'] = 'please enter a name of your cookie';
    if($discription == '') $errors['discription'] = 'please a discription of your cookie';
    if($ingridient == '') $errors['ingridient'] = 'please ingrideints seperated by comma ","';


    // see there's no error

    if (!array_filter($errors)) {
        $name = mysqli_real_escape_string($conn, $name);
        $discription = mysqli_real_escape_string($conn, $discription);
        $ingridient = mysqli_real_escape_string($conn, $ingridient);

        
    }
}
?>

<div class="container">
    <h1>Edit Cookie</h1>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $id; ?>">

        <div class="input-field">
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
            <label for="name" class="<?php echo $name ? 'active' : ''; ?>">Cookie name</label>
            <span class="red-text"><?php echo $errors['name']; ?></span>
        </div>

        <div class="input-field">
            <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($description); ?>">
            <label for="description" class="<?php echo $discription ? 'active' : ''; ?>">Description</label>
            <span class="red-text"><?php echo $errors['discription']; ?></span>
        </div>

        <div class="input-field">
            <input type="text" id="ingridient" name="ingridient" value="<?php echo htmlspecialchars($ingridient); ?>">
            <label for="ingridient" class="<?php echo $ingridient ? 'active' : ''; ?>">Ingredients</label>
            <span class="red-text"><?php echo $errors['ingridient']; ?></span>
        </div>

        <button class="btn waves-effect waves-light deep-orange" type="submit">
            Update <i class="fa-solid fa-floppy-disk"></i>
        </button>
        <a href="detail.php?id=<?php echo $id; ?>" class="btn-flat">Cancel</a>
    </form>
</div>

<?php include('template/footer.php'); ?>
