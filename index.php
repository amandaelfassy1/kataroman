

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="styles.css" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Convertisseur de nombres romains</title>
</head>
<body>
<?php include 'nav.html';?>
    <div class="container pt-5">
        <form method="POST">
            <div class="mb-3 p-5 bg-light">
                <label for="arabicNumber" class="form-label">Entrez un nombre arabe</label>
                <input type="number" class="form-control" id="arabicNumber" name="arabicNumber" required>
                <input class="mt-3 btn btn-primary" type="submit" value="Convertir">
            </div>
        </form>
    </div>
</body>
</html>
<?php
require_once 'RomanNumeralsConverter.php'; 

$converter = new RomanNumeralsConverter();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $arabicNumber = filter_input(INPUT_POST, 'arabicNumber', FILTER_VALIDATE_INT);
    if ($arabicNumber !== false && $arabicNumber >= 1 && $arabicNumber <= 3999) {
        $romanNumeral = $converter->convertToRoman($arabicNumber);
        echo '<div class="container pt-5">La représentation romaine de ' . $arabicNumber . ' est : ' . $romanNumeral . '</div>';
    } else {
        echo "Entrez un nombre arabe valide (1-3999).";
    }
    if ($arabicNumber === false) {
        echo "Erreur : La saisie n'est pas un nombre arabe valide.";
    } 
}

?>