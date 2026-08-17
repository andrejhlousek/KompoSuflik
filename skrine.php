<?php
// skrine.php
?>

<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Porovnanie skríň - KompoŠuflík</title>
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

<h2>Porovnanie skríň</h2>
<p>Vyberte dve skrine na porovnanie kliknutím na dlaždice:</p>

<?php
$cases = [
    [
        "name" => "NZXT H510",
        "img" => "Hloušek/Skrina1.jpg",
        "specs" => [
            "Typ" => "Mid Tower",
            "Materiál" => "Oceľ a plast",
            "Max GPU dĺžka" => "381 mm",
            "Max CPU chladič" => "165 mm"
        ]
    ],
    [
        "name" => "Corsair 4000D",
        "img" => "Hloušek/Skrina2.jpg",
        "specs" => [
            "Typ" => "Mid Tower",
            "Materiál" => "Oceľ a plast",
            "Max GPU dĺžka" => "360 mm",
            "Max CPU chladič" => "170 mm"
        ]
    ],
    [
        "name" => "Fractal Design Meshify C",
        "img" => "Hloušek/Skrina3.jpg",
        "specs" => [
            "Typ" => "Mid Tower",
            "Materiál" => "Oceľ a plast",
            "Max GPU dĺžka" => "315 mm",
            "Max CPU chladič" => "170 mm"
        ]
    ],
    [
        "name" => "Cooler Master MasterBox NR600",
        "img" => "Hloušek/Skrina4.jpg",
        "specs" => [
            "Typ" => "Mid Tower",
            "Materiál" => "Oceľ a plast",
            "Max GPU dĺžka" => "410 mm",
            "Max CPU chladič" => "166 mm"
        ]
    ]
];

echo '<div class="component-grid">';
foreach($cases as $case) {
    $jsonSpecs = htmlspecialchars(json_encode($case['specs']), ENT_QUOTES, 'UTF-8');
    echo '<div class="component-card" data-name="'.$case['name'].'" data-specs=\''.$jsonSpecs.'\'>';
    echo '<img src="'.$case['img'].'" alt="'.$case['name'].'">';
    echo '<span>'.$case['name'].'</span>';
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
                alert('Môžete porovnať maximálne 2 skrine naraz!');
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
