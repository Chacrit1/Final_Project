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
<html>

<head>
	<title>would you like to eat today?</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="container border border-primary my-4 p-5 d-flex flex-column align-items-center">
	<img class="w-25 mb-3" src="./cover.jpg" alt="cover">
	<h1 class="mb-3">What would you like to eat today?</h1>
	<div class="d-flex flex-row gap-2">
		<form class="d-flex flex-row gap-5" method="POST" action="./submit_order.php">
			<div>
				<div class="mb-3 d-flex flex-column">
					<label for="name">
						ชื่อ
					</label>
					<input name="name" type="text" require>
				</div>
				<div class="mb-3 d-flex flex-column">
					<label for="address">
						ที่อยู่
					</label>
					<input name="address" type="text" require>
				</div>
				<div class="mb-3 d-flex flex-column">
					<label for="phone">
						เบอร์โทรศัพท์
					</label>
					<input name="phone" type="text" require>
				</div>
				<a href="#"><button type="submit" name="submit_order" class="w-100 py-2">order food</button></a>
				<a href="./History.php"><button type="button" class="w-100 py-2 mt-2">history <span>(<?php
																										echo count($data);
																										?>)</span></button></a>

			</div>
			<div>
				<div class="mb-3 d-flex flex-column">
					<div class="d-flex flex-column">
						<label for="hamburger_quantity">
							แฮมเบอร์เกอร๋
						</label>
						<input name="hamburger_quantity" type="number" value="0" min="0" require>
					</div>
					<div class="d-flex flex-row gap-3 align-items-center mt-2">
						<div>
							<input class="form-check-input" type="checkbox" name="hamburger_toppings[]" value="มะเขือเทศ">
							<label class="form-check-label">
								มะเขือเทศ
							</label>
						</div>
						<div>
							<input class="form-check-input" type="checkbox" name="hamburger_toppings[]" value="ซีส">
							<label class="form-check-label">
								ซีส
							</label>
						</div>
						<div>
							<input class="form-check-input" type="checkbox" name="hamburger_toppings[]" value="แตงกวา">
							<label class="form-check-label">
								แตงกวา
							</label>
						</div>
					</div>
				</div>
				<div class="mb-3 d-flex flex-column">
					<div class="d-flex flex-column">
						<label for="pizza_quantity">
							พิชช่า
						</label>
						<input name="pizza_quantity" type="number" value="0" min="0" require>
					</div>
					<div class="d-flex flex-row gap-3 align-items-center mt-2">
						<div>
							<input class="form-check-input" type="checkbox" name="pizza_toppings_seafood" value="ซีฟู้ด">
							<label class="form-check-label">
								ซีฟู้ด
							</label>
						</div>
						<div>
							<input class="form-check-input" type="checkbox" name="pizza_toppings_cheese" value="ซีส">
							<label class="form-check-label">
								ซีส
							</label>
						</div>
						<div>
							<input class="form-check-input" type="checkbox" name="pizza_toppings_sweetchicken" value="ไก่หวาน">
							<label class="form-check-label">
								ไก่หวาน
							</label>
						</div>
					</div>
					<div class="d-flex flex-row gap-3 align-items-center mt-2">
						<div>
							<input class="form-check-input" type="checkbox" name="pizza_size_normal" value="Normal">
							<label class="form-check-label">
								Normal
							</label>
						</div>
						<div>
							<input class="form-check-input" type="checkbox" name="pizza_size_medium" value="Medium">
							<label class="form-check-label">
								Medium
							</label>
						</div>
						<div>
							<input class="form-check-input" type="checkbox" name="pizza_size_large" value="Large">
							<label class="form-check-label">
								Large
							</label>
						</div>
					</div>
				</div>

				<div class="mb-3 d-flex flex-column">
					<div class="d-flex flex-column">
						<label for="fries_quantity">
							เฟรนฟราย
						</label>
						<input name="fries_quantity" type="number" value="0" min="0" require>
					</div>
					<div class="d-flex flex-row gap-3 align-items-center mt-2">
						<div>
							<input class="form-check-input" type="checkbox" name="fries_size_normal" value="Normal">
							<label class="form-check-label">
								Normal
							</label>
						</div>
						<div>
							<input class="form-check-input" type="checkbox" name="fries_size_medium" value="Medium">
							<label class="form-check-label">
								Medium
							</label>
						</div>
						<div>
							<input class="form-check-input" type="checkbox" name="fries_size_large" value="Large">
							<label class="form-check-label">
								Large
							</label>
						</div>
					</div>
				</div>

				<div class="mb-3 d-flex flex-column">
					<div class="d-flex flex-column">
						<label for="cola_quantity">
							โค้ก
						</label>
						<input name="cola_quantity" type="number" value="0" min="0" require>
					</div>
					<div class="d-flex flex-row gap-3 align-items-center mt-2">
						<div>
							<input class="form-check-input" type="checkbox" name="cola_size_normal" value="Normal">
							<label class="form-check-label">
								Normal
							</label>
						</div>
						<div>
							<input class="form-check-input" type="checkbox" name="cola_size_medium" value="Medium">
							<label class="form-check-label">
								Medium
							</label>
						</div>
						<div>
							<input class="form-check-input" type="checkbox" name="cola_size_large" value="Large">
							<label class="form-check-label">
								Large
							</label>
						</div>
					</div>
				</div>
			</div>

		</form>
	</div>




</body>

</html>