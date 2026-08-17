<?php
// ram.php
?>

<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Porovnanie RAM - KompoŠuflík</title>
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

<h2>Porovnanie RAM</h2>
<p>Vyberte dva RAM moduly na porovnanie kliknutím na dlaždice:</p>

<?php
$rams = [
    [
        "name" => "Corsair Vengeance 16GB DDR4",
        "img" => "Hloušek/RAM1.jpg",
        "specs" => [
            "Kapacita" => "16 GB",
            "Frekvencia" => "3200 MHz",
            "Typ" => "DDR4",
            "Latencia" => "16 CL"
        ]
    ],
    [
        "name" => "G.Skill Trident Z 32GB DDR4",
        "img" => "Hloušek/RAM2.jpg",
        "specs" => [
            "Kapacita" => "32 GB",
            "Frekvencia" => "3600 MHz",
            "Typ" => "DDR4",
            "Latencia" => "18 CL"
        ]
    ],
    [
        "name" => "Kingston HyperX 16GB DDR4",
        "img" => "Hloušek/RAM3.jpg",
        "specs" => [
            "Kapacita" => "16 GB",
            "Frekvencia" => "3000 MHz",
            "Typ" => "DDR4",
            "Latencia" => "15 CL"
        ]
    ],
    [
        "name" => "Crucial Ballistix 32GB DDR4",
        "img" => "Hloušek/RAM4.jpg",
        "specs" => [
            "Kapacita" => "32 GB",
            "Frekvencia" => "3200 MHz",
            "Typ" => "DDR4",
            "Latencia" => "16 CL"
        ]
    ]
];

echo '<div class="component-grid">';
foreach($rams as $ram) {
    $jsonSpecs = htmlspecialchars(json_encode($ram['specs']), ENT_QUOTES, 'UTF-8');
    echo '<div class="component-card" data-name="'.$ram['name'].'" data-specs=\''.$jsonSpecs.'\'>';
    echo '<img src="'.$ram['img'].'" alt="'.$ram['name'].'">';
    echo '<span>'.$ram['name'].'</span>';
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
                alert('Môžete porovnať maximálne 2 RAM moduly naraz!');
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
