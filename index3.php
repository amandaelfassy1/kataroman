<!DOCTYPE html>
<html>
<head>
    <title>Convertisseur de chiffres romains</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php include 'nav.html';?>
<div class="container pt-5">
    <div class="mb-3 p-5 bg-light">
        <h1>Convertisseur de chiffres romains</h1>
        <p>Entrez un chiffre romain pour obtenir sa valeur numérique :</p>
        <input type="text" id="inputRoman" class="form-control" placeholder="Chiffre romain">
        <button id="convertButton" class="mt-3 btn btn-primary">Convertir</button>
        <div class="pt-2" id="result"></div>
    </div>
</div>
<script>
    // Fonction pour effectuer un appel REST (simulé)
    function appelRest(chiffreRomain) {
        // Ici, vous pourriez faire un appel REST réel à un serveur
        // Pour cet exemple, nous allons simplement utiliser un objet de réponse simulé
        const reponsesSimulees = {
            "I": 1,
            "V": 5,
            "X": 10,
            "L": 50,
            "C": 100,
            "D": 500,
            "M": 1000,
            "O": 0
        };

        let valeurNumerique = 0;
        let index = 0;

        while (index < chiffreRomain.length) {
            const currentSymbol = chiffreRomain[index];
            const currentSymbolValue = reponsesSimulees[currentSymbol];
            const nextSymbol = chiffreRomain[index + 1];
            const nextSymbolValue = reponsesSimulees[nextSymbol];

            if (nextSymbolValue && currentSymbolValue < nextSymbolValue) {
                valeurNumerique += (nextSymbolValue - currentSymbolValue);
                index += 2;  // Skip the next symbol
            } else {
                valeurNumerique += currentSymbolValue;
                index++;
            }
        }

        return valeurNumerique || "Chiffre romain non valide";
    }

    // Tableau pour stocker les réponses précédentes
    const reponsesPrecedentes = [];

    // Écouteur d'événement pour le bouton de conversion
    document.getElementById("convertButton").addEventListener("click", function () {
        const chiffreRomain = document.getElementById("inputRoman").value.toUpperCase();
        const reponse = appelRest(chiffreRomain);

        reponsesPrecedentes.push({ chiffreRomain, reponse });

        const resultDiv = document.getElementById("result");
        resultDiv.innerHTML = "<p>Réponses :</p>";

        for (const reponsePrecedente of reponsesPrecedentes) {
            resultDiv.innerHTML += `<p>${reponsePrecedente.chiffreRomain} : ${reponsePrecedente.reponse}</p>`;
        }
    });
</script>

</body>
</html>
