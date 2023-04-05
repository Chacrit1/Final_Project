<?php
require_once("Classes/Menu.php");


class Fries extends Menu
{
    private $size;

    public function __construct($name, $price, $quantity, $size)
    {
        parent::__construct($name, $price, $quantity, $size);
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getPrice()
    {
        if ($this->size == "Normal") {
            return 25 * $this->getQuantity();
        }
        if ($this->size == "Medium") {
            return 40 * $this->getQuantity();
        }
        if ($this->size == "Large") {
            return 50 * $this->getQuantity();
        }
    }

    public function display_order()
    {
        echo $this->getName() . " " . $this->getQuantity() . " ชิ้น ราคาชิ้นละ " . $this->getPrice() / $this->getQuantity() . " บาท  ขนาด " . $this->getSize() . " รวมทั้งหมด " . $this->getPrice() . "  (Normal 25 Medium 40 Large 50 ) <br/>";
    }
}
