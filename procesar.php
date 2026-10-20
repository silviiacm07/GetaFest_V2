<?php
include 'header.php';

$usuario_activo = $_POST['usuario_activo'] ?? '';
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$edad = intval($_POST['edad']);
$tipo_entrada = $_POST['tipo_entrada'];
$dias = $_POST['dias'] ?? [];
$pago = $_POST['pago'];
$observaciones = $_POST['observaciones'] ?? '';

if ($edad < 18) {
    echo "<h3>Acceso denegado</h3><p>Debes ser mayor de edad.</p>";
    echo "<a href='index.php' class='btn'>Volver</a></div></body></html>";
    exit;
}

// Subir foto con uniqid
$nombre_foto = "images/user_" . uniqid() . "." . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
move_uploaded_file($_FILES['foto']['tmp_name'], $nombre_foto);

// Calcular precio
$precio = 0;
if ($tipo_entrada == "General") $precio = 50;
if ($tipo_entrada == "VIP") $precio = 120;
if ($tipo_entrada == "SuperVIP") $precio = 180;

$precio += count($dias) * 10;
$dias_str = count($dias) > 0 ? implode(", ", $dias) : "Ninguno";
$fecha = date("Y-m-d H:i:s");

// Guardar en reservas.txt
$linea = "$fecha|$nombre|$email|$edad|$tipo_entrada|$dias_str|$pago|$precio €|$nombre_foto|$observaciones\n";
file_put_contents("reservas.txt", $linea, FILE_APPEND);
?>

<h2>Resumen de la Reserva</h2>
<img src="<?php echo $nombre_foto; ?>" width="100" style="border-radius:50%; display:block; margin: 0 auto;">
<p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>
<p><strong>Edad:</strong> <?php echo $edad; ?></p>
<p><strong>Entrada:</strong> <?php echo $tipo_entrada; ?></p>
<p><strong>Días:</strong> <?php echo $dias_str; ?></p>
<p><strong>Total a pagar:</strong> <?php echo $precio; ?> €</p>

<form action="ver_reservas.php" method="POST">
    <input type="hidden" name="usuario_activo" value="<?php echo $usuario_activo; ?>">
    <button type="submit">Ver Reservas</button>
</form>

<br>
<form action="index.php" method="POST">
    <input type="hidden" name="usuario_activo" value="<?php echo $usuario_activo; ?>">
    <button type="submit" style="background: #6c757d;">Nueva Reserva</button>
</form>

</div>
</body>
</html>