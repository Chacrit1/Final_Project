<?php
require_once("Classes/Menu.php");

class Burger extends Menu
{
    private $toppings;

    public function __construct($name, $price, $quantity, $toppings)
    {
        parent::__construct($name, $price, $quantity);
        $this->toppings  = $toppings;
    }

    public function getToppings()
    {
        return implode(",", $this->toppings);
    }

    public function display_order()
    {
        echo $this->getName() . " " . $this->getQuantity() . " ชิ้น ราคาชิ้นละ " . $this->getPrice() / $this->getQuantity() . " บาท ท้อปปิ้ง " . $this->getToppings() . " รวมทั้งหมด "  . $this->getPrice() . " <br/>";
    }
}
