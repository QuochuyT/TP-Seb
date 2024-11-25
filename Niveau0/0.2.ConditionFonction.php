<?php

function mineur($age) {

    if (!is_numeric($age) || $age < 0) {
    } if ($age <= 18) {
        return "Mineur";
    } else {
        return "Majeur";
    }
}

$age = 18;
echo mineur($age);

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <form method="post" action="">
        <label for="name">Prénom</label>
        <input type="text" name="name" required>
        <button type="submit">Envoyez</button>
    </form>

    <?php 
    if (!empty($_POST)) {
        if (isset($_POST['name'])){
            echo 'Bienvenue' . ($_POST['name']);
        };  
    }
    ?> 
</body>
</html>