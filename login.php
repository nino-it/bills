<?php include("config.php"); ?>
<?php include('START.php'); ?>

<?php session_start();

if (isset($_POST['login'])) {

    $user = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $stmt = $pdo->prepare('SELECT * FROM users WHERE name = ?');
    $stmt->bindValue('?', $user);

    //Execute.
    $stmt->execute([$user]);

    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user === false) {
        // Add error reporting
        die('Incorrect username / password combination!');
    } else {
        // User found, check pass
        $validPassword = password_verify($pass, $user['password']);

        if ($validPassword) {

            // Provide the user with a login session.
            $_SESSION['name'] = $user['name'];
            $_SESSION['logged_in'] = time();

            //Redirect to our protected page
            header('Location: ../home/');
            exit;
        } else {
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect username / password combination!');
        }
    }
}



?>

<div class="wrapper">
    <div class="container">
        <h1>Welcome</h1>

        <form action="login" class="form" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" id="login-button" name="login" value="login">Login</button>
        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>

    </ul>
</div>



<script>
$("#login-button").click(function(event) {
    event.preventDefault();

    $('form').fadeOut(500);
    $('.wrapper').addClass('form-success');
});
</script>



<?php include('END.php'); ?>