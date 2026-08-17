<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "komposuflik";

$conn = new mysqli($host, $user, $pass, $db);
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);

// Funkcia na načítanie všetkých komponentov z tabuľky
function getComponents($conn, $table) {
    $result = $conn->query("SELECT * FROM $table");
    $items = [];
    if($result) {
        while($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }
    return $items;
}

// Všetky kategórie
$categories = [
    "procesory"      => "Procesory",
    "ram"            => "RAM",
    "skrine"         => "Skrine",
    "ssd"            => "SSD",
    "zdroje"         => "Zdroje",
    "grafiky"        => "Grafické karty",
    "harddisk"       => "Harddisky",
    "zakladne_dosky" => "Základné dosky"
];

// Spracovanie formulára
$selected = [];
$totalPrice = 0;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach($categories as $table => $label) {
        if(isset($_POST[$table]) && $_POST[$table] != '') {
            $id = intval($_POST[$table]);
            $row = $conn->query("SELECT * FROM $table WHERE id=$id")->fetch_assoc();
            $selected[$label] = $row;
            $totalPrice += floatval($row['cena']);
        }
    }

    if($selected) {
        $proc = $selected['Procesory']['nazov'] ?? '';
        $ram_mem = $selected['RAM']['nazov'] ?? '';
        $case = $selected['Skrine']['nazov'] ?? '';
        $ssd_d = $selected['SSD']['nazov'] ?? '';
        $psu = $selected['Zdroje']['nazov'] ?? '';
        $gpu = $selected['Grafické karty']['nazov'] ?? '';
        $hdd = $selected['Harddisky']['nazov'] ?? '';
        $mobo = $selected['Základné dosky']['nazov'] ?? '';
        $cena = $totalPrice;

        $stmt = $conn->prepare("INSERT INTO konfiguracie 
            (procesor, ram, skrina, ssd, zdroj, grafika, harddisk, zakladne_dosky, cena_celkova) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "ssssssssd", 
            $proc, $ram_mem, $case, $ssd_d, $psu, $gpu, $hdd, $mobo, $cena
        );
        $stmt->execute();
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Konfigurátor | KompoŠuflík</title>
<style>
body { font-family: Arial, sans-serif; background: #e6f2ff; color: #000; margin: 0; padding: 20px; }
h2 { color: #1e90ff; }
form { max-width: 1000px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
.category { margin-bottom: 30px; }
.category label { font-weight: bold; display: block; margin-bottom: 10px; }
.category select { width: 100%; padding: 10px; font-size: 1em; border-radius: 5px; border: 1px solid #ccc; }
.component-info { display: flex; align-items: center; margin-top: 10px; gap: 20px; }
.component-info img { width: 100px; border-radius: 8px; }
.summary { background: #d0e7ff; padding: 20px; border-radius: 10px; margin-top: 20px; }
button { padding: 12px 20px; font-size: 1em; background: #1e90ff; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
button:hover { background: #187bcd; }
</style>
</head>
<body>

<h2>Konfigurátor počítača</h2>

<form method="post">
<?php foreach($categories as $table => $label):
    $components = getComponents($conn, $table);
?>
<div class="category">
    <label for="<?= $table ?>"><?= $label ?></label>
    <select name="<?= $table ?>" id="<?= $table ?>">
        <option value="">Vyberte <?= $label ?></option>
        <?php foreach($components as $comp): ?>
            <option value="<?= $comp['id'] ?>" <?= (isset($_POST[$table]) && $_POST[$table]==$comp['id'])?'selected':'' ?>>
                <?= $comp['nazov'] ?> - <?= number_format($comp['cena'],2) ?> €
            </option>
        <?php endforeach; ?>
    </select>

    <?php
    if(isset($selected[$label])) {
        $comp = $selected[$label];
        // FIX obrázkov: odstránime akúkoľvek existujúcu cestu a použijeme len názov súboru
        $filename = basename($comp['obrazok']); 
        $imgPath = 'Hloušek/'.$filename;

        echo '<div class="component-info">';
        echo '<img src="'.$imgPath.'" alt="'.$comp['nazov'].'">';
        echo '<div>';
        foreach($comp as $key => $value) {
            if(!in_array($key, ['id','obrazok','nazov','cena']) && $value) {
                echo ucfirst($key).': '.$value.'<br>';
            }
        }
        echo 'Cena: '.number_format($comp['cena'],2).' €';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>
<?php endforeach; ?>

<button type="submit">Zobraziť konfiguráciu</button>
</form>

<?php if($selected): ?>
<div class="summary">
    <h3>Celková cena: <?= number_format($totalPrice,2) ?> €</h3>
    <ul>
    <?php foreach($selected as $label => $comp): ?>
        <li><strong><?= $label ?>:</strong> <?= $comp['nazov'] ?> (<?= number_format($comp['cena'],2) ?> €)</li>
    <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

</body>
</html>