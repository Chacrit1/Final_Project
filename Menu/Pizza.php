<?php
require_once("Classes/Menu.php");


class Pizza extends Menu
{
    private $toppings;
    private $size;

    public function __construct($name, $price, $quantity, $toppings, $size)
    {
        parent::__construct($name, $price, $quantity, $toppings, $size);
        $this->size = $size;
        $this->toppings = $toppings;
    }

    public function getToppings()
    {
        return $this->toppings;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getPrice()
    {
        if ($this->size == "Normal") {
            return 229 * $this->getQuantity();
        }
        if ($this->size == "Medium") {
            return 339 * $this->getQuantity();
        }
        if ($this->size == "Large") {
            return 449 * $this->getQuantity();
        }
    }

    public function display_order()
    {
        echo $this->getName() . " " . $this->getQuantity() . " ชิ้น ราคาชิ้นละ " . $this->getPrice() / $this->getQuantity() . " บาท หน้า " . $this->getToppings() . " รวมทั้งหมด "  . $this->getPrice() . " <br/>";
    }
}
