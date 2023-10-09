<?php

spl_autoload_register(function ($class): ?string {
    $path = str_replace('\\', '/', $class . '.php');
    if (file_exists($path)) {
        require $path;
    }
    return null;
});

$title = 'Joke About Chuck';

if (trim($_SERVER['REQUEST_URI'], '/') === 'echo') {
    $controller = new EchoController();
    var_dump($controller->post());
}

if (trim($_SERVER['REQUEST_URI'], '/') === 'chuck') {
    $controller = new ChuckController();
    $response = $controller->post()['value'];
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chuck</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form {
            text-align: center;
        }
        .btn {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <H2>Joke About Chuck</H2>
        <form class="form" action="http://onix/chuck" method="post">
            <button type="submit" class="btn">Learn more...</button>
            <div><?php echo $response ?></div>
        </form>
    </div>
</body>
</html>
