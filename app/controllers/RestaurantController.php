<?php
require_once 'persistence/dao/RestaurantDAO.php';

class RestaurantController {
    public function index() {
        $restaurants = RestaurantDAO::getAll();
        include 'app/views/public/list.php';
    }
    
    public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $image_url = $_POST['image_url'];
        $price_range = $_POST['price_range'];
        $menu = $_POST['menu'];
        $category_id = $_POST['category_id'];

        // Validaciones
        if (empty($name) || empty($image_url) || empty($price_range) || empty($menu) || empty($category_id)) {
            $error = "Todos los campos son obligatorios.";
        } elseif (!filter_var($image_url, FILTER_VALIDATE_URL)) {
            $error = "La URL de la imagen no es válida.";
        } elseif (!preg_match('/^\d+-\d+$/', $price_range)) {
            $error = "El rango de precio debe ser válido (ejemplo: 20-30).";
        } else {
            RestaurantDAO::insert($name, $image_url, $price_range, $menu, $category_id);
            header('Location: index.php');
            exit();
        }
    }
    include 'app/views/public/create.php';
}

}
?>
