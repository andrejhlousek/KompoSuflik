<h2>O nás</h2>
<p>KompoŠuflík je stránka zameraná na pomoc zákazníkom pri výbere počítačových komponentov. Našou hlavnou myšlienkou je uľahčiť nákup kvalitných komponentov za rozumnú cenu a ušetriť čas a energiu našim návštevníkom.</p>
<p>Vytvorili sme túto platformu preto, aby každý, kto plánuje zostaviť nový počítač, vylepšiť existujúcu zostavu alebo jednoducho hľadá informácie o komponentoch, mal prístup k prehľadným, jasným a spoľahlivým informáciám. Naša stránka poskytuje rady, odporúčania a tipy na kompatibilitu jednotlivých komponentov.</p>
<p>Filozofia KompoŠuflík je založená na troch pilieroch:</p>

<ul style="list-style:none; max-width:800px; margin:20px auto; padding:0;">
<?php
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
?>
</ul>

<p>Našou misiou je spraviť výber komponentov jednoduchým, prehľadným a príjemným zážitkom, aby si každý mohol zostaviť svoj ideálny počítač bez stresu a zbytočných komplikácií.</p>
