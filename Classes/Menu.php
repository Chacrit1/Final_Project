<?php
require_once('./Excel/PHPExcel.php');

abstract class Menu
{
    private $name;
    private $price;
    private $quantity;

    public function __construct($name, $price, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price * $this->quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function display_order()
    {
        return $this->getName() . " " . $this->getQuantity() . " ชิ้น ราคาชิ้นละ " . $this->getPrice() / $this->getQuantity() . " บาท รวมทั้งหมด " . $this->getPrice() . " <br/>";
    }
}
