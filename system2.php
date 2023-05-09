<!DOCTYPE html>
<html>
<head>
	<title>Power, Energy and Charge Calculator</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Power, Energy and Charge Calculator</h1>
		<form method="post">
			<div class="form-group">
        <label for="voltan">Voltage </label>
        <input type="number" class="form-control" id="voltan" name="voltan" step="any" required>Voltage (V)
      </div>
            <div class="form-group">
				<label for="current">Current </label>
				<input type="number" class="form-control" id="current" name="current" step="any" required>Ampere (A)
			</div>
			<div class="form-group">
				<label for="time">Time (h)</label>
				<input type="number" class="form-control" id="time" name="time" step="any" required> jam
			</div>
			<div class="form-group">
				<label for="rate">Rate (Rs/kWh)</label>
				<input type="number" class="form-control" id="rate" name="rate" step="any" required>sen/kwh
			</div>
			<button type="submit" class="btn btn-primary">Calculate</button>
		</form>
		<?php
		function calculate_power($current, $voltan) {
			return $current * $voltan; // assuming voltage is 230V
		}

		function calculate_energy($power, $time) {
			return $power * $time *1000;
		}

		function calculate_charge($energy, $rate) {
			return $energy * ($rate / 100); // kWh to units conversion
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        	$voltan = $_POST['voltan'];
            $current = $_POST['current'];
			$time = $_POST['time'];
			$rate = $_POST['rate'];

			$power = calculate_power($current, $voltan);
			$energy = calculate_energy($power, $time);
			$charge = calculate_charge($energy, $rate);

			echo '<hr>';
			echo '<p>Power: '.number_format($power, 2).' W</p>';
			echo '<p>Energy: '.number_format($energy, 2).' Wh</p>';
			echo '<p>Total Charge/jam: RM '.number_format($charge, 2).'</p>';
            echo '<p>Total Charge/24 hour: RM '.number_format($charge*24, 2).'</p>';
		}
		?>
	</div>
</body>
</html>
