# Projet UF

Le document est divisé en deux parties :
- Utilisation : cette partie est destinée aux utilisateurs de l'objet connecté.
- Administration : cette seconde partie est destinée à l'administration de l'objet connecté, d'AdafruitIO ainsi que du serveur back-end.

## Utilisation

### Installation

Pour commencer, branchez l'objet connecté à une alimentation à l'aide d'un câble USB.
A l'issue de cette opération, l'objet connecté est allumé et prêt à être configuré.

### Configuration

La suite de la configuration nécessite un appareil mobile ou un ordinateur.
Connectez-vous en WiFi au réseau nommé "MYNODEMCU". Une page s'ouvre, choisissez le réseau auquel la plante doit se connecter, puis entrez le mot de pass.
A l'issue de cette action, le réseau est enregistré dans l'objet connecté.
Si la connexion WiFi nommée "MYNODEMCU" disparaît, alors l'objet connecté est connecté au WiFi de votre domicile.

Maintenant que votre objet est connecté au WiFi et que vous connaissez le numéro de carte de votre objet connecté, rendez vous sur le site pour vous inscrire.
Vous devez entrer :
- Nom,
- Prénom,
- Email,
- Mot de passe et sa confirmation,
- Numéro de carte Arduino.
- Plant parmi une sélection.
Vous êtes maintenant inscrit !

### Utilisation

Connectez-vous au site, en entrant vos identifiants. Vous accédez ainsi au tableau de bord qui comporte :
- Données collectées,
- Données types,
- Possibilité de changer de plante.

## Administration

Le depôt GitHub comporte deux dossiers :
- Objet : le code de la plante connectée,
- Serveur : le code du serveur back-end.

### Déploiement

Pour le déploiement de l'objet connecté, récupérez le dossier PlanteConnectee présent dans le dossier Objet.

Pour le déploiement du serveur, récupérez la totalité du dossier Serveur. Le serveur nécessite une base de données MySQL. Pour déployer la base de données, utilisez le fichier create_database.sql dans la console MySQL.

### Configuration

Pour la configuration de l'objet connecté, il n'y a rien à faire, car l'utilisateur configure la totalité de l'objet connecté.

Pour la configuration du serveur, modifiez le db.ini, pour que les informations présentes soient en adéquation avec les vôtres.

### Gestion

Connectez-vous à phpmyadmin, pour gérer les utilisateurs créés, les plantes enregistrées.