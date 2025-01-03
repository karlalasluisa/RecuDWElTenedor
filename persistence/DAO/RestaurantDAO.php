<?php

require_once 'persistence/conf/Database.php';
require_once 'app/models/Restaurant.php';

class RestaurantDAO {

    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM restaurant");
        $restaurants = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $restaurants[] = new Restaurant(
                    $row['id'],
                    $row['name'],
                    $row['image_url'],
                    $row['price_range'],
                    $row['menu'],
                    $row['category_id']
            );
        }
        return $restaurants;
    }

    public static function insert($name, $image_url, $price_range, $menu, $category_id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO restaurant (name, image_url, price_range, menu, category_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $image_url, $price_range, $menu, $category_id]);
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM restaurant WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Restaurant($row['id'], $row['name'], $row['image_url'], $row['price_range'], $row['menu'], $row['category_id']);
        }
        return null;
    }

    public static function update($id, $name, $image_url, $price_range, $menu, $category_id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE restaurant SET name = ?, image_url = ?, price_range = ?, menu = ?, category_id = ? WHERE id = ?");
        $stmt->execute([$name, $image_url, $price_range, $menu, $category_id, $id]);
    }
    
    public static function delete($id) {
    $db = Database::getInstance();
    $stmt = $db->prepare("DELETE FROM restaurant WHERE id = ?");
    $stmt->execute([$id]);
}

}

?>
