<?php

class Order
{
    private $items;
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
        $this->items = [];
    }

    public function add_item($item)
    {
        $this->items[] = $item;
    }

    public function getCount()
    {
        return count($this->items);
    }

    public function total_price()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }

    public function display_order()
    {
        foreach ($this->items as $item) {
            $item->display_order();
        }
    }

    public function save_to_excel()
    {
        require_once('./Excel/PHPExcel/IOFactory.php');
        $objPHPExcel = PHPExcel_IOFactory::load("./csv/output.csv");
        $worksheet = $objPHPExcel->getActiveSheet();
        $lastRow = $worksheet->getHighestDataRow();
        $newRow = $lastRow + 1;
        $worksheet->setCellValue('A' . $newRow, $this->user->display_information());
        $worksheet->setCellValue('B' . $newRow, $this->total_price());
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('./csv/output.csv');
    }
}
