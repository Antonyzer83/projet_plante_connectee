<html>
    <head>
        <title>Inscription</title>
        <link rel="stylesheet" type="text/css" href="./style/connection.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    </head>

    <body>
        <div>
            <h1>Inscription</h1>
            <form method="post" action="index.php?action=checkinscription">
                <div class="labinp">
                    <label for="lastname">Nom :</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>
                <div class="labinp">
                    <label for="firstname">Prénom :</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>
                <div class="labinp">
                    <label for="email">Mail :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="labinp">
                    <label for="firstpsswd">Mot de passe :</label>
                    <input type="password" id="firstpsswd" name="firstpsswd" required>
                </div>
                <div class="labinp">
                    <label for="secondpsswd">Confirmation du mot de passe :</label>
                    <input type="password" id="secondpsswd" name="secondpsswd" required>
                </div>
                <div class="labinp">
                    <label for="card">Numéro de carte Arduino :</label>
                    <input type="text" id="card" name="card" required>
                </div>
                <div class="labinp">
                    <label for="plant">Plante :</label>
                    <select name="plant" id="plant">
                        <?php echo $content;?>
                    </select>
                </div>
                <input type="submit" value="Envoyer">
            </form>
            <a href="index.php?action=connection">Déjà inscrit ?</a>
        </div>
    </body>
</html>