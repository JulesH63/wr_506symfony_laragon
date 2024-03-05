Prérequis
Node.js, Projet Backend WR506, Npm

Installation
git clone https://github.com/JulesH63/symfony506.git

Accédez au répertoire du projet :
cd symfony506

Installez les dépendances en exécutant la commande :
npm install

Créez le fichier .env.local en copiant le fichier .env :
cp .env .env.local

Renseignez les variables suivantes dans le fichier .env.local en remplaçant les valeurs par les vôtres :
VITE_SERVER_API_URL= urlAPI
Assurez-vous de remplacer http://localhost:3000/api par l'URL de votre API backend.

Lancement du serveur
Pour le développement, lancez le serveur avec la commande :
npm run dev

Pour la production, construisez le projet avec la commande :
npm run build

Puis démarrez le serveur avec la commande :
npm start

Identifiants par défaut pour se connecter à l'application :

Utilisateurs:
user2@example.com
password

