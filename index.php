<?php
$usuario_activo = $_POST['usuario_activo'] ?? '';
if ($usuario_activo == "") {
    header("Location: login.php");
    exit;
}

include 'header.php';
?>

    <div style="font-size: 0.85rem; color: #94a3b8; margin-bottom: 15px;">
        Usuario activo: <strong><?php echo $usuario_activo; ?></strong>
    </div>

    <h2>GetaFest 🎉</h2>

    <form action="procesar.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="usuario_activo" value="<?php echo $usuario_activo; ?>">

        <label>Nombre y Apellidos:</label>
        <input type="text" name="nombre" required>

        <label>Correo electrónico:</label>
        <input type="email" name="email" required>

        <label>Edad:</label>
        <input type="number" name="edad" required>

        <label>Tipo de entrada:</label><br>
        <input type="radio" name="tipo_entrada" value="General" required> General (50 €)<br>
        <input type="radio" name="tipo_entrada" value="VIP"> VIP (120 €)<br>
        <input type="radio" name="tipo_entrada" value="SuperVIP"> SuperVIP (180 €)<br><br>

        <label>Días de asistencia (+10 € cada uno):</label>
        <div class="dias-container">
            <div class="dia-item">
                <input type="checkbox" id="viernes" name="dias[]" value="Viernes">
                <label for="viernes" style="font-weight: normal; margin: 0;">Viernes</label>
            </div>
            <div class="dia-item">
                <input type="checkbox" id="sabado" name="dias[]" value="Sabado">
                <label for="sabado" style="font-weight: normal; margin: 0;">Sábado</label>
            </div>
            <div class="dia-item">
                <input type="checkbox" id="domingo" name="dias[]" value="Domingo">
                <label for="domingo" style="font-weight: normal; margin: 0;">Domingo</label>
            </div>
        </div>

        <label>Método de pago:</label>
        <select name="pago" required>
            <option value="">-- Selecciona --</option>
            <option value="Tarjeta">Tarjeta de crédito</option>
            <option value="Bizum">Bizum</option>
            <option value="PayPal">PayPal</option>
        </select>

        <label>Foto del asistente:</label>
        <input type="file" name="foto" required>

        <label>Observaciones:</label>
        <textarea name="observaciones"></textarea>

        <button type="submit">Generar Acreditación</button>
    </form>

    <br>
    <form action="ver_reservas.php" method="POST">
        <input type="hidden" name="usuario_activo" value="<?php echo $usuario_activo; ?>">
        <button type="submit" class="btn" style="background-color: #334155;">Ver Reservas</button>
    </form>

<?php
echo '</div>';
echo '</div>';
echo '</body>';
echo '</html>';
?>