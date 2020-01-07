# Déscription

Class PHP pour généré des GUID, des token, des passwords et des chaines (caractere, chiffre, caractere spaciaux)

## Installation

## With composer 
```php
    composer require Fabacks/Random
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

### Constante CASE
    CASE_LOWER : tous les caractere sont minuiscule;
    CASE_UPPER : tous les careste  sont en majuscule;
    CASE_MIXTE : mélange minuscule et majuscule;

### Constante Type
    TYPE_LETTER : Retourne une lettre de l'alphabet de A à Z
    TYPE_NUMBER : Retourne un chiffre de 0 à 9
    TYPE_ALPHANUMERIC : Retourne une lettre de l'alphabet de A à Z OU un chiffre de 0 à 9
    TYPE_SPECIAL : Retourne un caractere spéciaux
    TYPE_CHARACTER : Retourne une lettre, ou un nombre, ou caractere spéciaux


## License
[MIT](https://choosealicense.com/licenses/mit/)