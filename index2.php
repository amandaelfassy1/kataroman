<!DOCTYPE html>
<html>
<head>
    <title>Convertir un nombre romain en nombre arabe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php include 'nav.html';?>
    <div class="container pt-5">
    <h1>Convertisseur de nombres romains en nombres arabes</h1>
    <form action="" method="post">
        Entrez un nombre romain : <input type="text" name="romanNumber">
        <input type="submit" value="Convertir">
    </form>
    <div>
    <?php
    function romanToArabic($romanNumber) {
        $romanNumerals = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        );
        
        $arabicNumber = 0;
        
        while (!empty($romanNumber)) {
            $found = false;
            foreach ($romanNumerals as $roman => $arabic) {
                if (strpos($romanNumber, $roman) === 0) {
                    $arabicNumber += $arabic;
                    $romanNumber = substr($romanNumber, strlen($roman));
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                return false; // Retourner une valeur indiquant une erreur
            }
        }
        
        return $arabicNumber;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $romanNumber = strtoupper($_POST["romanNumber"]);
        $arabicNumber = romanToArabic($romanNumber);
        if ($arabicNumber === false) {
            echo "Erreur : La saisie n'est pas un nombre romain valide.";
        } else {
            echo '<div class="container pt-5">Le nombre romain <b>' .$romanNumber.' </b> correspond au nombre arabe <b>$arabicNumber</b>.';
        }
    }
    ?>
</body>
</html>
