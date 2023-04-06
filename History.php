<?php
ini_set('display_errors', 0);

require_once "./excel/PHPExcel.php";
$tmpfname = "csv/output.csv";
$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
$excelObj = $excelReader->load($tmpfname);
$worksheet = $excelObj->getSheet(0);
$lastRow = $worksheet->getHighestRow();
$data = [];
for ($row = 2; $row <= $lastRow; $row++) {
    $array = array(
        'user' => $worksheet->getCell('A' . $row)->getValue(),
        'total' => $worksheet->getCell('B' . $row)->getValue(),
    );
    array_push($data, $array);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Document</title>
</head>

<body class="container my-4">
    <h2>ประวัติการสั่งอาหาร</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ผู้ใช้</th>
                <th scope="col">รวมทั้งหมด</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $item) { ?>
                <tr>
                    <td><?php echo $item['user']; ?></td>
                    <td><?php echo $item['total']; ?> บาท</td>
                <?php } ?>
        </tbody>
    </table>
    <a href="/"><button type="button">กลับหน้าแรก</button></a>
</body>

</html>