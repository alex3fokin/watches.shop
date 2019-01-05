<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IShop Ошибка</title>
</head>
<body>
    <h1>Произошла ошибка:</h1>
    <div>
        <ul>
            <li>
                <strong>Текст ошибки:</strong> <?= $error_text ?>
            </li>
            <li>
                <strong>Файл ошибки:</strong> <?= $error_file ?>
            </li>
            <li>
                <strong>Строка ошибки:</strong> <?= $error_line ?>
            </li>
        </ul>
    </div>
</body>
</html>