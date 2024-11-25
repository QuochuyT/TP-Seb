<!-- Variables et types de données -->
<?php 

$texte = 'Hello';
$entier = 0;
$bool = true;

var_dump($texte);
var_dump($entier);
var_dump($bool);

for ($i = 1; $i < 20; $i++) {
    if ($i % 2 == 0) {
       echo $i;
    } 
};