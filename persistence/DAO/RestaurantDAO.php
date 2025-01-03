<?php
require_once 'persistence/conf/Database.php';

class RestaurantDAO {
    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM restaurant");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function insert($name, $image_url, $price_range, $menu, $category_id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO restaurant (name, image_url, price_range, menu, category_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $image_url, $price_range, $menu, $category_id]);
    }
}
?>
