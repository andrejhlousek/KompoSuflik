<h2>Komponenty</h2>

<?php
$components = [
    "Procesor" => "Hloušek/Procesor.jpg",
    "Ram" => "Hloušek/Ram.jpg",
    "Skrina" => "Hloušek/Skrina.jpg",
    "SSD" => "Hloušek/SSD.jpg",
    "Zdroj" => "Hloušek/Zdroj.jpg",
    "HardDisk" => "Hloušek/HardDisk.jpg",
    "Grafik" => "Hloušek/Grafika.jpg"
];

echo '<div class="component-grid">';
foreach($components as $name => $img) {
    // Odkomentovaný odkaz cez index.php
    $link = ($name == "Procesor") ? "index.php?page=procesory" : "index.php?page=blank_".$name;
    echo '<a class="component-card" href="'.$link.'">';
    echo '<img src="'.$img.'" alt="'.$name.'">';
    echo '<span>'.$name.'</span>';
    echo '</a>';
}
echo '</div>';
?>
