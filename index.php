<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<?php

function convertLength($value, $fromUnit, $toUnit)
{
    $conversionFactors = [
        //meters
        //cm
    ];

    if(!isset($conversionFactors[$fromUnit]) || !isset($conversionFactors[$toUnit])) {
        return "You have entered incorrect units";
    }

    $result = $value * $conversionFactors[$fromUnit] / $conversionFactors[$toUnit];

    return $result;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = $_POST['value'];
    $fromUnit = $_POST['from_unit'];
    $toUnit = $_POST['to_unit'];

    $result = convertLength($value, $fromUnit, $toUnit);
    echo "<p>{$value} {$fromUnit} is equal to: {$result} {$toUnit}</p>";
}



?>


<body>
    <form method="post" action="">
        <label for="value">Value:</label>
        <input type="number" step="any" name="value" required>

        <label for="from_unit">From:</label>
        <select name="from_unit" required>
            <option value="centimeters">Centimeter</option>
            <option value="meters">Meter</option>
        </select>

        <label for="to_unit">To :</label>
        <select name="to_unit" required>
            <option value="centimeter">Centimeter</option>
            <option value="meters">Meter</option>
        </select>

        <button type="submit">Convert</button>
    </form>
</body>

</html>