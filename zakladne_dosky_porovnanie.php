<?php
// zakladne_dosky_porovnanie.php
?>

<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Porovnanie základných dosiek - KompoŠuflík</title>
<style>
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

#comparison-panel { display:flex; gap:20px; margin-top:30px; flex-wrap:wrap; }
.comparison-card { background:#f0f8ff; padding:20px; border-radius:10px; flex:1; min-width:250px; }
.comparison-card h3 { color:#1e90ff; margin-bottom:10px; }
.comparison-card ul { list-style:none; padding-left:0; }
.comparison-card li { margin-bottom:5px; }
</style>
</head>
<body>

<h2>Porovnanie základných dosiek</h2>
<p>Vyberte dve základné dosky na porovnanie kliknutím na dlaždice:</p>

<?php
$mobos = [
    [
        "name" => "ASUS ROG Strix B650-E",
        "img" => "Hloušek/MOBO1.jpg",
        "specs" => [
            "Socket" => "AM5",
            "Chipset" => "B650-E",
            "RAM" => "DDR5 6400MHz",
            "Formát" => "ATX"
        ]
    ],
    [
        "name" => "MSI MPG Z790 Carbon",
        "img" => "Hloušek/MOBO2.jpg",
        "specs" => [
            "Socket" => "LGA1700",
            "Chipset" => "Z790",
            "RAM" => "DDR5 6000MHz",
            "Formát" => "ATX"
        ]
    ],
    [
        "name" => "Gigabyte X670 AORUS Elite",
        "img" => "Hloušek/MOBO3.jpg",
        "specs" => [
            "Socket" => "AM5",
            "Chipset" => "X670",
            "RAM" => "DDR5 6200MHz",
            "Formát" => "ATX"
        ]
    ],
    [
        "name" => "ASRock B760 Steel Legend",
        "img" => "Hloušek/MOBO4.jpg",
        "specs" => [
            "Socket" => "LGA1700",
            "Chipset" => "B760",
            "RAM" => "DDR4 5333MHz",
            "Formát" => "ATX"
        ]
    ]
];

echo '<div class="component-grid">';
foreach($mobos as $mobo) {
    $jsonSpecs = htmlspecialchars(json_encode($mobo['specs']), ENT_QUOTES, 'UTF-8');
    echo '<div class="component-card" data-name="'.$mobo['name'].'" data-specs=\''.$jsonSpecs.'\'>';
    echo '<img src="'.$mobo['img'].'" alt="'.$mobo['name'].'">';
    echo '<span>'.$mobo['name'].'</span>';
    echo '</div>';
}
echo '</div>';

echo '<div id="comparison-panel"></div>';
?>

<script>
const cards = document.querySelectorAll('.component-card');
let selected = [];

cards.forEach(card => {
    card.addEventListener('click', () => {
        const name = card.dataset.name;
        const specs = JSON.parse(card.dataset.specs);

        if(selected.some(p => p.name === name)) {
            selected = selected.filter(p => p.name !== name);
            card.style.border = 'none';
        } else {
            if(selected.length < 2) {
                selected.push({name, specs});
                card.style.border = '3px solid #1e90ff';
            } else {
                alert('Môžete porovnať maximálne 2 základné dosky naraz!');
            }
        }
        showComparison();
    });
});

function showComparison() {
    const panel = document.getElementById('comparison-panel');
    if(selected.length === 2) {
        const html = selected.map(p => {
            return `<div class="comparison-card">
                        <h3>${p.name}</h3>
                        <ul>
                            ${Object.entries(p.specs).map(([k,v]) => `<li><strong>${k}:</strong> ${v}</li>`).join('')}
                        </ul>
                    </div>`;
        }).join('');
        panel.innerHTML = html;
    } else {
        panel.innerHTML = '';
    }
}
</script>

</body>
</html>
