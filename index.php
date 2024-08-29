<?php
// index.php

session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Memory Game 2.0</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Memory Game 2.0</h1>
    <form action="start.php" method="post">
        <div>
            <label for="playerName">Nom du joueur :</label>
            <input type="text" id="playerName" name="playerName" required>
        </div>
        <div>
            <label for="pairsCount">Nombre de paires :</label>
            <select id="pairsCount" name="pairsCount">
                <?php for ($i = 3; $i <= 12; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <button type="submit">Commencer le jeu</button>
    </form>

    <a href="leaderboard.php">Voir le classement</a>
</body>

</html>