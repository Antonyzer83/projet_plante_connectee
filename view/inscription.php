<html>
    <head>
        <title>Inscription</title>
    </head>

    <body>
        <h1>Inscription</h1>
        <form method="post" action="../controller/inscriptionpost.php">
            <div>
                <label for="lastname">Nom :</label>
                <input type="text" name="lastname" required>
            </div>
            <div>
                <label for="firstname">Prénom :</label>
                <input type="text" name="firstname" required>
            </div>
            <div>
                <label for="email">Mail :</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="firstpsswd">Mot de passe :</label>
                <input type="password" name="firstpsswd" required>
            </div>
            <div>
                <label for="secondpsswd">Confirmation du mot de passe :</label>
                <input type="password" name="secondpsswd" required>
            </div>
            <div>
                <label for="card">Numéro de carte Arduino :</label>
                <input type="text" name="card" required>
            </div>
            <!-- Choix de la plante avec menu déroulant -->
            <input type="submit" value="Envoyer">
        </form>
    </body>
</html>