<!DOCTYPE html>
<html>
<head>
  <title>TnB Calculate</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>bill calculate</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="form-group">
        <label for="voltan">Voltage </label>
        <input type="number" class="form-control" id="voltan" name="voltan" step="any" required>Voltage (V)
      </div>
      <div class="form-group">
        <label for="ampere">Current </label>
        <input type="number" class="form-control" id="ampere" name="ampere" step="any" required>Ampere (A)
      </div>
      <div class="form-group">
        <label for="time">Time </label>
        <input type="number" class="form-control" id="time" name="time" step="any" required>jam
      </div>
      <div class="form-group">
          <label for="rate">Current Rate </label>
        <input type="number" class="form-control" id="rate" name="rate" step="any" required>sen/kWh
      </div>
      <button type="submit" class="btn btn-primary">Calculate</button>
    </form>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $voltan = $_POST["voltan"];
        $ampere = $_POST["ampere"];
        $time = $_POST["time"];
        $rate = $_POST["rate"];
        calcAll($voltan,$ampere,$time,$rate);
      }
        function calcAll($voltan,$ampere,$time,$rate){
        // Calculte power in watt
        $power = $voltan * $ampere;
        
        // Calculate energy in kilowatt-jam
        $energy = $power * $time / 1000;
        
        // Calculate total in sen
        $total = $energy * $rate * 100;
        
        // Output
        echo '<table class="table">';
        echo '<tr><th>Power (W)</th><td>' . $power . '</td></tr>';
        echo '<tr><th>Energy (kWh)</th><td>' . $energy . '</td></tr>';
        echo '<tr><th>Total (sen)</th><td>' . $total . '</td></tr>';
            echo '<tr><th>Total (sen)</th><td>' . $total*24 . '</td></tr>';
        echo '</table>';
      }
    ?>
  </div>
</body>
</html>