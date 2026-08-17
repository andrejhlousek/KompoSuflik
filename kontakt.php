<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kontakt – KompoŠuflík</title>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
body { background-color: #e6f2ff; color: #1e90ff; }

header {
    background-color: #1e90ff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 30px;
}
.header-title h1 { color: #ffffff; font-size: 2em; font-weight: bold; margin: 0; }
.header-menu ul { list-style: none; display: flex; gap: 25px; }
.header-menu ul li a {
    text-decoration: none;
    color: #ffffff;
    font-weight: bold;
    font-size: 1.2em;
    padding: 5px 10px;
    position: relative;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.header-menu ul li a::after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: #ffffff;
    transition: width 0.3s;
    position: absolute;
    bottom: -2px;
    left: 0;
}
.header-menu ul li a:hover::after { width: 100%; }
.header-menu ul li a:hover {
    color: #f0f8ff;
    transform: scale(1.2) translateY(-3px);
    text-shadow: 0 0 8px rgba(255,255,255,0.6);
}

main.page {
    background-color: #ffffff;
    padding: 40px 60px;
    min-height: 60vh;
    max-width: 1200px;
    margin: 20px auto;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
}

form { max-width: 500px; margin: 0 auto; text-align: left; }
label { display: block; margin-top: 10px; font-weight: bold; }
input, textarea { width: 100%; padding: 8px; margin-top: 5px; border-radius: 5px; border: 1px solid #ccc; }
input[type="submit"] { background-color: #1e90ff; color: #fff; border: none; cursor: pointer; margin-top: 15px; }
input[type="submit"]:hover { background-color: #104e8b; }

footer {
    background-color: #1e90ff;
    color: #ffffff;
    padding: 15px 0;
    text-align: center;
    font-weight: 400;
    font-size: 0.9em;
    border-top: 2px solid #ffffff;
}
</style>
</head>
<body>

<header>
    <div class="header-title"><h1>KompoŠuflík</h1></div>
    <div class="header-menu">
        <nav>
            <ul>
                <li><a href="index.php?page=home">🏠 Hlavné menu</a></li>
                <li><a href="kontakt.php">📧 Kontakt</a></li>
                <li><a href="index.php?page=komponenty">💻 Komponenty</a></li>
                <li><a href="index.php?page=o_nas">ℹ️ O stránke</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="page">
    <h2>Kontaktujte nás</h2>
    <form action="" method="post">
        <label for="name">Meno:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Správa:</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <input type="submit" value="Odoslať">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
       
    }