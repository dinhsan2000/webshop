<?php
ob_start();
session_start();
require_once ("connection.php");
if(isset($_POST["id"]) && isset($_POST["number"])) {
    $id = $_POST["id"];
    $number = $_POST["number"];
    $sqlCart = "SELECT p.*,s.size_name,s.size_number FROM products AS p INNER JOIN size AS s ON s.size_id = s.size_id WHERE pro_id = $id";
    $resultCart = mysqli_query($conn, $sqlCart);
    $rowCart = mysqli_fetch_row($resultCart);
    if(!isset($_SESSION["cart"])) {
        $cart = array (
            $id => array (
                'name' => $rowCart[1],
                'size' => $rowCart[12]."-".$rowCart[13],
                'price' => $rowCart[6],
                'color' => $rowCart[11],
                'image' => $rowCart[5],
                'quantity' => $number

            )
        );
    } else {
        $cart = $_SESSION["cart"];
        if (array_key_exists($id, $cart)) {
            $cart[$id] = array(
                    'name' => $rowCart[1],
                    'size' => $rowCart[12]."-".$rowCart[13],
                    'price' => $rowCart[6],
                    'color' => $rowCart[11],
                    'image' => $rowCart[5],
                    'quantity' => $cart["$id"]["quantity"] + $number

                );
        } else {
            $cart[$id] = array(
                'name' => $rowCart[1],
                'size' => $rowCart[12]."-".$rowCart[13],
                'price' => $rowCart[6],
                'color' => $rowCart[11],
                'image' => $rowCart[5],
                'quantity' => $number

            );
        }
    }
    $_SESSION["cart"] = $cart;
}
?>
