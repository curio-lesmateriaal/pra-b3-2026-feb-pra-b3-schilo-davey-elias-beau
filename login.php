<!doctype html>
<html lang="nl">
<head>
    <title>Login</title>
    <?php require_once 'head.php'; ?>
</head>

<body>
<?php require_once 'header.php'; ?>

<main>
    <div class="container">
        <h2>Inloggen</h2>

        <form method="POST">
            <input type="text" name="username" placeholder="Gebruikersnaam" required><br><br>
            <input type="password" name="password" placeholder="Wachtwoord" required><br><br>
            <button type="submit">Login</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $_POST["username"];
            $pass = $_POST["password"];

            if ($user === "admin" && $pass === "1234") {
                echo "<p style='color:green;'>Succesvol ingelogd</p>";
            } else {
                echo "<p style='color:red;'>Foute gegevens</p>";
            }
        }
        ?>
    </div>
</main>

<?php require_once 'footer.php'; ?>
</body>
</html>