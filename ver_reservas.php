<?php
$usuario_activo = $_POST['usuario_activo'] ?? '';
if ($usuario_activo == "") {
    header("Location: login.php");
    exit;
}

$reservas = [];
if (file_exists("reservas.txt")) {
    $reservas = file("reservas.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

include 'header.php';
?>

<h2>Listado de Reservas</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Nombre</th>
        <th>Entrada</th>
        <th>Total</th>
        <th>Acción</th>
    </tr>
    <?php foreach($reservas as $index => $linea):
        $datos = explode("|", $linea);
        $id = $index + 1;
        ?>
        <tr>
            <td>#<?php echo $id; ?></td>
            <td><?php echo $datos[0]; ?></td>
            <td><?php echo $datos[1]; ?></td>
            <td><?php echo $datos[4]; ?></td>
            <td><?php echo $datos[7]; ?></td>
            <td>
                <form action="ver_pase.php" method="POST" style="margin:0;">
                    <input type="hidden" name="usuario_activo" value="<?php echo $usuario_activo; ?>">
                    <input type="hidden" name="id_reserva" value="<?php echo $id; ?>">
                    <button type="submit" style="padding: 5px;">Ver Pase</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<form action="index.php" method="POST">
    <input type="hidden" name="usuario_activo" value="<?php echo $usuario_activo; ?>">
    <button type="submit" style="background: #6c757d;">Nueva Reserva</button>
</form>

</div>
</body>
</html>