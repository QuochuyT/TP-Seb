<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des fichiers</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Nom</label><br>
        <input type="text" name="name" required>
    <br>
    <br>
        <label for="age">Âge</label><br>
        <input type="number" name="age" required>
    <br>
    <br>
        <label for="email">Mail</label><br>
        <input type="email" name="email" required>
    <br>
    <br>
        <button type="submit">Enregistrer</button>
    </form>

   <?php
    $name = htmlspecialchars($_POST['name']);
    $age = intval($_POST['age']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Vérifie si le formulaire est soumis
    if (!empty($_POST)) {
        if (isset($_POST['name'])){
            // echo ($_POST['name']).PHP_EOL;
            // echo '<br>';
        } 
        if (isset($_POST['age'])){
            // echo ($_POST['age']).PHP_EOL;
            // echo '<br>';
        }
        if (isset($_POST['email'])){
            // echo ($_POST['email']).PHP_EOL;
            // echo '<br>';
        }
        if (!empty($name) && $age > 0 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $line = "Name: $name | Âge: $age | Email: $email\n";
            echo '<br>';

            $fichier = 'Liste.txt';
            if (file_put_contents($fichier, $line, FILE_APPEND)) {
                echo 'Vos données sont enregistrer'.PHP_EOL;
            }
        }

 
        if(file_exists($fichier)) {
        if(filesize($fichier) != 0) { // le fichier n'est pas vide
 
            $lines = file($fichier);
 
            echo '<table border="1" style="border-collapse:collapse;">';
            echo '<tr>';
            echo '<th>name </th>';
            echo '<th>Age</th>';
            echo '<th>Email</th>';
            echo '</tr>';
 
        foreach($lines as $line_num => $ligne) { // on lit le fichier de façon séquentielle
            $array = explode('|', $ligne); // retire le séparateur
            echo '<tr>';
            echo '<td>'. $array[0] .'</td>';
            echo '<td>'. $array[1] .'</td>';
            echo '<td>'. $array[2] .'</td>';
            echo '</tr>';
        }
            echo '</table>';
        }
}
}
?>
</body>
</html>