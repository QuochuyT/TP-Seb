
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires</title>
</head>
<body>

    <?php if (!empty($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="name">Nom :</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="comment">Commentaire :</label><br>
        <textarea id="comment" name="comment" rows="5" required></textarea><br><br>

        <button type="submit">Envoyer</button>
    </form>

    <?php
        // Nom du fichier JSON où seront stockés les commentaires
        $filename = 'comments.json';

        // Fonction pour lire les commentaires existants
        function getComments($filename) {
            if (file_exists($filename)) {
            $jsonData = file_get_contents($filename);
            return json_decode($jsonData, true) ?? [];
        }
        return [];
}

// Sauvegarde des commentaires
        function saveComment($filename, $comments) {
            $jsonData = json_encode($comments, JSON_PRETTY_PRINT);
            file_put_contents($filename, $jsonData);
}

// Si un commentaire est soumis
if (!empty($_POST)) {
    $name = htmlspecialchars(trim($_POST['name'])); // Nom de l'utilisateur
    $comment = htmlspecialchars(trim($_POST['comment'])); // Commentaire

    if (!empty($name) && !empty($comment)) {
        $newComment = [
            'name' => $name,
            'comment' => $comment,
            'date' => date('Y-m-d H:i:s'),
        ];

        if(!file_exists($filename))  {
        $comments = [$newComment];
        } else {
            $comments = getComments($filename);
            $comments[] = $newComment;
        }

        saveComment($filename, $comments);

        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $error = 'Veuillez remplir tous les champs.';
    }
}
$comments = getComments($filename);
?>



    <?php if (!empty($comments)): ?>
        <?php foreach ($comments as $comment): ?>
                <h4><?= htmlspecialchars($comment['name']) ?></h4>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun commentaire pour le moment.</p>
    <?php endif; ?>
</body>
</html>

