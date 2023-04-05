<?php
class user
{
    private $name;
    private $address;
    private $phone;

    function __construct($name, $address, $phone)
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function display_information(){
        return "ชื่่อ " . $this->getName() . " ที่อยู่ " . $this->getAddress() . " เบอร์โทรศัพท์ " . $this->getPhone();
    }
}
