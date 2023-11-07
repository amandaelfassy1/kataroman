<?php
require_once 'RomanNumeralsConverter.php'; // Inclure la classe RomanNumeralsConverter

$converter = new RomanNumeralsConverter();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $arabicNumber = filter_input(INPUT_POST, 'arabicNumber', FILTER_VALIDATE_INT);
    if ($arabicNumber !== false && $arabicNumber >= 1 && $arabicNumber <= 3999) {
        $romanNumeral = $converter->convertToRoman($arabicNumber);
        echo "La représentation romaine de $arabicNumber est : $romanNumeral";
    } else {
        echo "Entrez un nombre arabe valide (1-3999).";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Convertisseur de nombres romains</title>
</head>
<body>
    <form method="POST">
        <label for="arabicNumber">Entrez un nombre arabe (1-3999) : </label>
        <input type="number" id="arabicNumber" name="arabicNumber" required>
        <input type="submit" value="Convertir">
    </form>
</body>
</html>
