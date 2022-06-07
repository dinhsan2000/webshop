<?php
    $id=$_GET['id'];
    $sqlSelect = "SELECT * FROM products WHERE pro_id='$id'";
    $result = mysqli_query($conn, $sqlSelect);
    $row = mysqli_fetch_assoc($result);
    $sqlDel = "DELETE FROM `products` WHERE pro_id=" . $_GET["id"];
    mysqli_query($conn, $sqlDel);
?>