# L'architecture du site web

1. Le dossier class contient les différents modules de l'application et ainsi des classes qui sont appellés  dynamiquement (en utilisant les parametres de l'url) à partir du fichier index.php dans le dossier public qui sert de routeur

2. Les framework sont situés dans le répertoire sdk

3. Les vues sont situées dans le répertoire views
    3.A. Le répertoire views/partials contient les parties du fichier principal tels que les scripts, les stylesheets et le header.
    3.B. Le répertoire views/templates contient les vues pour chaque module, chaque vue et associée à une action.
    3.C. Le fichier views/index.php correspond à la destination des vues.

4. Le répertoire public est destiné aux frameworks front end, les assets js, css, et fonts

D'autres explications seront inscrites en commentaire dans le code.