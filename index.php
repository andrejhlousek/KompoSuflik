<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KompoŠuflík</title>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
body { background-color: #e6f2ff; color: #000; }

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

/* ===== Intro blok pod menu (scroll info) ===== */
.main-info-block {
    background-color: #d0e7ff;
    text-align: center;
    padding: 15px 20px;
    border-bottom: 2px solid #1e90ff;
    font-size: 1.1em;
    font-weight: bold;
    color: #1e90ff;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}
.main-info-block.visible {
    opacity: 1;
    transform: translateY(0);
}

main.home, main.page {
    background-color: #ffffff;
    padding: 40px 60px;
    min-height: 60vh;
    max-width: 1200px;
    margin: 20px auto;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
}
main.home { text-align: center; }
main h2 { font-size: 2em; color: #1e90ff; margin-bottom: 20px; text-shadow: 1px 1px 2px rgba(0,0,0,0.1); }
main img { max-width: 600px; width: auto; height: auto; display: block; margin: 20px auto; border-radius: 10px; transition: transform 0.3s ease; }
main ul { text-align: left; max-width: 800px; margin: 20px auto; font-size: 1.1em; line-height: 1.6; }
main ul li { margin-bottom: 12px; }

footer {
    background-color: #1e90ff;
    color: #ffffff;
    padding: 15px 0;
    text-align: center;
    font-weight: 400;
    font-size: 0.9em;
    border-top: 2px solid #ffffff;
}

/* Komponenty - dlaždice */
.component-grid { display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; margin-top: 20px; }
.component-card {
    width: 200px; height: 200px; border-radius: 10px; overflow: hidden;
    box-shadow: 0 0 10px rgba(0,0,0,0.1); cursor: pointer; text-decoration: none; color: #000;
    display: flex; flex-direction: column; transition: transform 0.3s ease, filter 0.3s ease; filter: brightness(0.7); text-align: center;
}
.component-card img { width: 100%; height: 140px; object-fit: cover; transition: transform 0.3s ease, filter 0.3s ease; }
.component-card span { flex: 1; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.1em; background-color: #fff; }
.component-card:hover { filter: brightness(1.2); transform: scale(1.05); color: #1e90ff; }
.component-card:hover img { transform: scale(1.05); filter: brightness(1.2); }

/* O nás */
.about-item { display: flex; align-items: center; margin-bottom: 20px; transition: transform 0.3s ease, filter 0.3s ease; font-size: 1em; }
.about-item strong { margin-right: 5px; }
.about-item .about-icon { width: 35px; height: 35px; margin-right: 15px; transition: transform 0.3s ease, filter 0.3s ease; }
.about-item:hover .about-icon { transform: scale(1.2); filter: brightness(1.3); }

/* ===== NOVÝ BLOK SCROLL ===== */
.scroll-section {
    background-color: #f0f8ff;
    padding: 60px 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
    border-radius: 10px;
    margin: 40px auto;
    max-width: 1200px;
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
    opacity: 0;
    transform: translateY(50px);
    transition: transform 0.8s ease, opacity 0.8s ease;
}
.scroll-section.visible {
    opacity: 1;
    transform: translateY(0);
}
.scroll-section img { max-width: 400px; width: 100%; height: auto; border-radius: 10px; }
.scroll-section .scroll-text { max-width: 500px; font-size: 1.2em; color: #1e90ff; line-height: 1.5; }

/* ===== Recenzie ===== */
.reviews-section {
    background-color: #f0f8ff;
    padding: 40px 20px;
    border-radius: 10px;
    margin: 40px auto;
    max-width: 1000px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
}
.reviews-section h2 {
    color: #1e90ff;
    margin-bottom: 30px;
}
.review {
    background-color: #ffffff;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 0 8px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.review:hover {
    transform: scale(1.02);
    box-shadow: 0 0 15px rgba(0,0,0,0.15);
}
.review p { margin: 5px 0; font-size: 1em; }

/* Kontakt - form styling (rovnako ako page) */
form { max-width: 500px; margin: 0 auto; text-align: left; }
label { display: block; margin-top: 10px; font-weight: bold; }
input, textarea { width: 100%; padding: 8px; margin-top: 5px; border-radius: 5px; border: 1px solid #ccc; }
input[type="submit"] { background-color: #1e90ff; color: #fff; border: none; cursor: pointer; margin-top: 15px; }
input[type="submit"]:hover { background-color: #104e8b; }
</style>
</head>
<body>

<header>
    <div class="header-title"><h1>KompoŠuflík</h1></div>
    <div class="header-menu">
        <nav>
            <ul>
                <li><a href="index.php?page=home">🏠 Hlavné menu</a></li>
                <li><a href="index.php?page=kontakt">📧 Kontakt</a></li>
                <li><a href="index.php?page=komponenty">💻 Komponenty</a></li>
                <li><a href="index.php?page=o_nas">ℹ️ O stránke</a></li>
                <li><a href="index.php?page=konfigurator">🛠️ Konfigurátor</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="main-info-block">
    💡 KompoŠuflík vám pomáha vybrať ideálne počítačové komponenty rýchlo a bez stresu!
</div>

<main class="<?php echo ($page == 'home') ? 'home' : 'page'; ?>">
<?php
if($page == 'home') {
    include 'home.php';
}
elseif($page == 'o_nas') {
    echo '<h2>O nás</h2>';
    echo '<p>KompoŠuflík je stránka zameraná na pomoc zákazníkom pri výbere počítačových komponentov. Našou hlavnou myšlienkou je uľahčiť nákup kvalitných komponentov za rozumnú cenu a ušetriť čas a energiu našim návštevníkom.</p>';
    echo '<ul style="list-style:none; max-width:800px; margin:20px auto; padding:0;">';
    $aboutItems = [
        "Spoľahlivosť" => ["Hloušek/reliability.png", "Poskytujeme overené informácie a odporúčania, aby si zákazník mohol byť istý správnym výberom."],
        "Jednoduchosť" => ["Hloušek/simplicity.png", "Naša stránka je navrhnutá tak, aby aj menej skúsení používatelia našli všetko potrebné bez zbytočného hľadania."],
        "Úspora času" => ["Hloušek/time.png", "S KompoŠuflíkom nemusíte porovnávať stovky produktov – všetko potrebné nájdete na jednom mieste."]
    ];
    foreach($aboutItems as $title => $data) {
        echo '<li class="about-item">
                <img src="'.$data[0].'" alt="'.$title.'" class="about-icon">
                <strong>'.$title.':</strong> '.$data[1].'
              </li>';
    }
    echo '</ul>';
}
elseif($page == 'komponenty') {
    echo '<h2>Komponenty</h2>';
    $components = [
        "Procesor" => "Hloušek/Procesor.jpg",
        "Ram" => "Hloušek/Ram.jpg",
        "Skrina" => "Hloušek/Skrina.jpg",
        "SSD" => "Hloušek/SSD.jpg",
        "Zdroj" => "Hloušek/Zdroj.jpg",
        "HardDisk" => "Hloušek/HardDisk.jpg",
        "Grafik" => "Hloušek/Grafika.jpg",
        "Zakladne_dosky" => "Hloušek/MOBO1.jpg"
    ];

    echo '<div class="component-grid">';
    foreach($components as $name => $img) {
        $link = "index.php?page=blank_".$name;
        if($name === "Procesor") $link = "index.php?page=procesory";
        elseif($name === "Ram") $link = "index.php?page=ram";
        elseif($name === "Skrina") $link = "index.php?page=skrine";
        elseif($name === "SSD") $link = "index.php?page=ssd";
        elseif($name === "Zdroj") $link = "index.php?page=zdroj";
        elseif($name === "HardDisk") $link = "index.php?page=harddisk";
        elseif($name === "Grafik") $link = "index.php?page=grafik";
        elseif($name === "Zakladne_dosky") $link = "index.php?page=zakladne_dosky";

        echo '<a class="component-card" href="'.$link.'">';
        echo '<img src="'.$img.'" alt="'.$name.'">';
        echo '<span>'.$name.'</span>';
        echo '</a>';
    }
    echo '</div>';
}

// Zahrnutie podstránok pre komponenty
elseif($page == 'procesory') { include 'procesory.php'; }
elseif($page == 'ram') { include 'ram.php'; }
elseif($page == 'skrine') { include 'skrine.php'; }
elseif($page == 'ssd') { include 'ssd.php'; }
elseif($page == 'zdroj') { include 'zdroj.php'; }
elseif($page == 'harddisk') { include 'harddisk.php'; }
elseif($page == 'grafik') { include 'grafiky.php'; }
elseif($page == 'zakladne_dosky') { include 'zakladne_dosky_porovnanie.php'; }

// <-- KONFIGURÁTOR -->
elseif($page == 'konfigurator') { include 'konfigurator.php'; }

// <-- KONTAKT -->
elseif($page == 'kontakt') {
    echo '<h2>Kontaktujte nás</h2>';
    echo '<form action="" method="post">
            <label for="name">Meno:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Správa:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <input type="submit" value="Odoslať">
          </form>';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        $file = 'spravy.txt';
        $entry = "[".date('Y-m-d H:i:s')."] $name <$email>: $message\n";
        file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);

        echo '<p style="text-align:center; margin-top:15px; color:#1e90ff; font-weight:bold;">
                Vaša správa bola úspešne odoslaná!
              </p>';
    }
}

elseif(strpos($page,'blank_') === 0) {
    $compName = str_replace('blank_','',$page);
    echo "<h2>$compName</h2>";
    echo "<p>Obsah stránky pre $compName ešte nie je pripravený.</p>";
}
else {
    echo '<h2>Stránka nenájdená</h2>';
}
?>
</main>

<footer>
&copy; 2025 KompoŠuflík. Všetky práva vyhradené.
</footer>

<?php if($page == 'home'): ?>
<script>
const text = document.createElement('div');
text.textContent = "KompoŠuflík";
Object.assign(text.style, {
    position: 'fixed',
    fontSize: '2.2em',
    fontWeight: 'bold',
    color: 'rgba(30,144,255,0.55)',
    textShadow: '0 0 12px rgba(30,144,255,0.6)',
    pointerEvents: 'none',
    zIndex: 1000,
    left: '100px',
    top: '100px'
});
document.body.appendChild(text);

let posX = 100, posY = 100, velX = 4, velY = 3;
function animate() {
    posX += velX;
    posY += velY;
    const width = text.offsetWidth;
    const height = text.offsetHeight;
    if(posX + width >= window.innerWidth || posX <= 0) velX *= -1;
    if(posY + height >= window.innerHeight || posY <= 0) velY *= -1;
    text.style.left = posX + 'px';
    text.style.top = posY + 'px';
    requestAnimationFrame(animate);
}
animate();

const scrollSection = document.querySelector('.scroll-section');
const infoBlock = document.querySelector('.main-info-block');
function handleScroll() {
    const rect = scrollSection.getBoundingClientRect();
    if(rect.top < window.innerHeight - 100) {
        scrollSection.classList.add('visible');
        window.removeEventListener('scroll', handleScroll);
    }
    const infoRect = infoBlock.getBoundingClientRect();
    if(infoRect.top < window.innerHeight - 50) {
        infoBlock.classList.add('visible');
    }
}
window.addEventListener('scroll', handleScroll);
</script>
<?php endif; ?>

</body>
</html>