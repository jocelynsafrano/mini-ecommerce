<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><? if(isset($title)){echo $title;}else{ echo 'Home page';} ?></title>
    <?php include '../views/_partials/scripts_top.php';?>
    <?php include '../views/_partials/stylesheets.php';?>
</head>
<body>

    <?php include '../views/_partials/header.php';?>
    <title><? if(isset($content)){echo $content;}else{ echo 'Bienvenue';} ?></title>

    <?php include '../views/_partials/scripts_bottom.php';?>
</body>
</html>