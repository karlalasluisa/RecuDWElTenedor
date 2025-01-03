<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Restaurantes</h1>
    <div class="restaurant-list">
        <?php foreach ($restaurants as $restaurant): ?>
            <div class="restaurant-card">
                <img src="<?= htmlspecialchars($restaurant['image_url']) ?>" alt="Restaurant Image">
                <h2><?= htmlspecialchars($restaurant['name']) ?></h2>
                <p>Precio: <?= htmlspecialchars($restaurant['price_range']) ?></p>
                <p>Menú: <?= htmlspecialchars($restaurant['menu']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
