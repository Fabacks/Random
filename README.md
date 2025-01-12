# Déscription

Class PHP pour généré des GUID, des token, des passwords et des chaines (caractère, chiffre, caractère spéciaux)

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
    CASE_LOWER : Tous les caractère sont minuscule;
    CASE_UPPER : Tous les caractère  sont en majuscule;
    CASE_MIXTE : Mélange minuscule et majuscule;

### Constante Type
    TYPE_LETTER : Retourne une lettre de l'alphabet de A à Z
    TYPE_NUMBER : Retourne un chiffre de 0 à 9
    TYPE_ALPHANUMERIC : Retourne une lettre de l'alphabet de A à Z OU un chiffre de 0 à 9
    TYPE_SPECIAL : Retourne un caractère spéciaux
    TYPE_CHARACTER : Retourne une lettre, ou un nombre, ou caractère spéciaux


## License
[MIT](https://choosealicense.com/licenses/mit/)