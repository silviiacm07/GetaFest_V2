<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $password = trim($_POST["password"]);

    $lineas = file("usuario.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $valido = false;

    foreach ($lineas as $linea) {
        list($user_file, $pass_file) = explode(":", $linea);
        if ($usuario === $user_file && $password === $pass_file) {
            $valido = true;
            break;
        }
    }

    if ($valido) {
        echo '
        <form id="f" action="index.php" method="POST">
            <input type="hidden" name="usuario_activo" value="' . $usuario . '">
        </form>
        <script>document.getElementById("f").submit();</script>
        ';
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}

include 'header.php';
?>

<h2>Iniciar Sesión</h2>
<?php if($error != "") echo "<p style='color:red;'>$error</p>"; ?>

<form action="login.php" method="POST">
    <label>Usuario:</label>
    <input type="text" name="usuario" required>

    <label>Contraseña:</label>
    <input type="password" name="password" required>

    <button type="submit">Entrar</button>
</form>

</div>
</body>
</html>