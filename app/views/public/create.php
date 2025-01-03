<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="name" required>
    <label>URL de Imagen:</label>
    <input type="url" name="image_url" required>
    <label>Rango de Precios:</label>
    <input type="text" name="price_range" placeholder="Ejemplo: 20-30" required>
    <label>Menú:</label>
    <textarea name="menu" required></textarea>
    <label>Categoría:</label>
    <select name="category_id" required>
        <!-- Opciones generadas dinámicamente -->
    </select>
    <button type="submit">Crear</button>
</form>
