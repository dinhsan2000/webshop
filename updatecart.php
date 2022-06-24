<?php
ob_start();
session_start();
require_once("connection.php");
if (isset($_POST["id"]) && isset($_POST["number"])) {
    $id = $_POST["id"];
    $number = $_POST["number"];
    if (isset($_SESSION["cart"])) {
        $cart = $_SESSION["cart"];
        if ($number > 0) {
            $cart[$id] = array(
                'name' => $cart[$id]["name"],
                'size' => $cart[$id]["size"],
                'price' => $cart[$id]["price"],
                'color' => $cart[$id]["color"],
                'image' => $cart[$id]["image"],
                'quantity' => $number

            );
        } else {
            unset($cart[$id]);
        }
    }
    $_SESSION["cart"] = $cart;
}
?>