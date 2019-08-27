# Déscription

Class PHP pour généré  des GUID, des token et des chaines (caractere, chiffre, caractere spaciaux)

## Installation

## With composer 
```php
    composer require fabacks/random
```

### Without composer
```php
    require_once YOUR_PATH."Random.php";
```

## Usage
```php
\Fabacks\Random::generate(8);
```
## Doc
Option possible pour la méthode generate
    generate(LONGEUR, CASE, TYPE)

### CASE
    LOWER : tous les caractere sont minuiscule;
    UPPER : tous les careste  sont en majuscule;
    MIXTE : mélange minuscule et majuscule;

### Type
    LETTER : Retourne une lettre de l'alphabet de A à Z
    NUMBER : Retourne un chiffre de 0 à 9
    ALPHANUMERIC : Retourne une lettre de l'alphabet de A à Z OU un chiffre de 0 à 9
    SPECIAL : Retourne un caractere spéciaux
    CHARACTER : Retourne une lettre, ou un nombre, ou caractere spéciaux


## License
[MIT](https://choosealicense.com/licenses/mit/)