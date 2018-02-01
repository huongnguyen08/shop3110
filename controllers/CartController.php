<?php
require_once 'model/DetailFoodModel.php';
require_once 'helpers/Cart.php';
session_start();

class CartController {

    function addToCart(){
        $id = $_GET['idSP'];
        $model = new DetailFoodModel;
        $food = $model->selectFoodById($id);

        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);

        $cart->add($food, $qty=1);
        $_SESSION['cart'] = $cart;

        //print_r($_SESSION['cart']);
        echo $food->name;
    }
    function updateCart(){
        $id = $_GET['id'];
        $qty = $_GET['qty'];

        $model = new DetailFoodModel;
        $food = $model->selectFoodById($id);

        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        $cart->update($food, $qty);
        $_SESSION['cart'] = $cart;//lưu cart mới vào session
        //print_r($_SESSION['cart']);
        echo $totalOneFood = number_format($cart->items[$id]['price'],0,',','.') . " vnd";

        echo $total = number_format($cart->totalPrice,0,',','.').' vnd'; 
    }
}

?>