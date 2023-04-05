<?php
require_once("Classes/Menu.php");

class Cola extends Menu
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
            return 12 * $this->getQuantity();
        }
        if ($this->size == "Medium") {
            return 15 * $this->getQuantity();
        }
        if ($this->size == "Large") {
            return 18 * $this->getQuantity();
        }
    }

    public function display_order()
    {
        echo $this->getName() . " " . $this->getQuantity() . " ชิ้น ราคาชิ้นละ " . $this->getPrice() / $this->getQuantity() . " บาท  ขนาด " . $this->getSize() . " รวมทั้งหมด " . $this->getPrice() . " (Normal 12 Medium 15 Large 18 )<br/>";
    }
}
