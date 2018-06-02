# L'architecture du site web

1. Le dossier class contient les différents modules de l'application et ainsi des classes qui sont appellés  dynamiquement (en utilisant mes parametres de l'url) à partir du fichier index.php dans le dossier public qui sert de routeur

2. les framework sont dans sdk

3. les vues sont dans views
    3. 1. le dossier partials contient les parties du fichier principale tels que les scripts, les stylesheets et le header
    3. 2. les templates contient les vues pour chaque modules, chaque vue et associé à une action
    3. 3. le fichier index est ou toutes les vus sont rendues

4. public est le dossier qui est accésé par le public est dont doit avoir 777 comme permission. C'est là ou on met les frameworks front end et les assets js, css, et fonts

Vous trouverez des explications sur l'organisation et le rôle du code ailleurs dans le fichiers