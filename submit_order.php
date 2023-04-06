<?php
ini_set('display_errors', 0);
require_once("./Classes/Order.php");
require_once("./Classes/User.php");
require_once("./Menu/Burger.php");
require_once("./Menu/Cola.php");
require_once("./Menu/Fries.php");
require_once("./Menu/Pizza.php");


if (isset($_POST['submit_order'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $hamburger_quantity = $_POST['hamburger_quantity'];
    $hamburger_toppings = $_POST['hamburger_toppings'];
    $pizza_quantity = $_POST['pizza_quantity'];

    if (isset($_POST['pizza_toppings_seafood'])) {
        $pizza_toppings = $_POST['pizza_toppings_seafood'];
    }
    if (isset($_POST['pizza_toppings_cheese'])) {
        $pizza_toppings = $_POST['pizza_toppings_cheese'];
    }
    if (isset($_POST['pizza_toppings_sweetchicken'])) {
        $pizza_toppings = $_POST['pizza_toppings_sweetchicken'];
    }

    if (isset($_POST['pizza_size_normal'])) {
        $pizza_size = "Normal";
    }
    if (isset($_POST['pizza_size_medium'])) {
        $pizza_size = "Medium";
    }
    if (isset($_POST['pizza_size_large'])) {
        $pizza_size = "Large";
    }

    $fries_quantity = $_POST['fries_quantity'];
    if (isset($_POST['fries_size_normal'])) {
        $fries_size = "Normal";
    }
    if (isset($_POST['fries_size_medium'])) {
        $fries_size = "Medium";
    }
    if (isset($_POST['fries_size_large'])) {
        $fries_size = "Large";
    }
    $cola_quantity = $_POST['cola_quantity'];
    if (isset($_POST['cola_size_normal'])) {
        $cola_size = "Normal";
    }
    if (isset($_POST['cola_size_medium'])) {
        $cola_size = "Medium";
    }
    if (isset($_POST['cola_size_large'])) {
        $cola_size = "Large";
    }

    $user = new User($name, $address, $phone);
    $order = new Order($user);

    $burger = new Burger("burger", 69, $hamburger_quantity, $hamburger_toppings);
    $fries = new Fries("fries", 25, $fries_quantity, $fries_size);
    $pizza = new Pizza("pizza", 229, $pizza_quantity, $pizza_toppings, $pizza_size);
    $cola = new Cola("cola", 12, $cola_quantity, $cola_size);

    $order->add_item($burger);
    $order->add_item($fries);
    $order->add_item($pizza);
    $order->add_item($cola);
    echo $user->display_information() . "<br/>";
    $order->display_order();
    echo "<b>ราคาทั้งหมด " . $order->total_price() . "</b>";
    $order->save_to_excel();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br /><a href="/">กลับหน้าแรก</a>
</body>

</html>