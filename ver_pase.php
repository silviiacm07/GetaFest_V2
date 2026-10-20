<?php
$usuario_activo = $_POST['usuario_activo'] ?? '';
$id_reserva = intval($_POST['id_reserva'] ?? 0);

if ($usuario_activo !== "admin") {
    include 'header.php';
    echo "<h3>Acceso denegado</h3><p>Solo el administrador puede ver los pases.</p>";
    echo "<form action='ver_reservas.php' method='POST'><input type='hidden' name='usuario_activo' value='$usuario_activo'><button class='btn'>Volver</button></form>";
    echo "</div></body></html>";
    exit;
}

$lineas = file("reservas.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$indice = $id_reserva - 1;
$datos = explode("|", $lineas[$indice]);

include 'header.php';
?>

<h2>Pase #<?php echo $id_reserva; ?> (Admin)</h2>
<img src="<?php echo $datos[8]; ?>" width="120" style="border-radius:50%; display:block; margin: 0 auto;">
<p><strong>Nombre:</strong> <?php echo $datos[1]; ?></p>
<p><strong>Email:</strong> <?php echo $datos[2]; ?></p>
<p><strong>Edad:</strong> <?php echo $datos[3]; ?></p>
<p><strong>Tipo:</strong> <?php echo $datos[4]; ?></p>
<p><strong>Días:</strong> <?php echo $datos[5]; ?></p>
<p><strong>Pago:</strong> <?php echo $datos[6]; ?></p>
<p><strong>Total:</strong> <?php echo $datos[7]; ?></p>
<p><strong>Observaciones:</strong> <?php echo $datos[9]; ?></p>

<form action="ver_reservas.php" method="POST">
    <input type="hidden" name="usuario_activo" value="<?php echo $usuario_activo; ?>">
    <button type="submit" style="background: #6c757d;">Volver al listado</button>
</form>

</div>
</body>
</html>