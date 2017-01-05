# BookCover

Il s'agit d'un petit package pour générer des couvertures génériques de
livre qui peut être utilisé avec des affichages de livre en ligne, etc.
dans les cas où aucune couverture originale n'est disponible.

Les éléments de couverture (titre, sous-titre, créateurs, etc.)
seront dimensionnés, ajustés et éventuellement enveloppés automatiquement.
Cela fonctionne assez bien dans la plupart des cas, mais le résultat ne sera
certainement pas visuellement / typographiquement agréable dans tous les cas.
Le package ne fournit actuellement aucune option pour ajuster manuellement
l'agencement des éléments de couverture.

Le paquet est développé par [@Medlib](https://github.com/medlib-v2).

### Installation

Installation à l'aide de Composer:

```bash
composer require medlib/cover dev-master
```

Le package nécessite ImageMagick et Ghostscript.

### Configuration
```php

require('vendor/autoload.php');
use Medlib\BookCover;

$cover = new BookCover();
$cover->setTitle('Manual of scientific illustration')
	->setSubtitle('with special chapters on photography, cover design and book manufacturing')
	->setCreators('Charles S. Papp')
	->setEdition('3rd enl. ed.')
	->setPublisher('American Visual Aid Books')
	->setDatePublished('1976')
	->randomizeBackgroundColor()
	->save('manual_of_scientific.png');
```

### Exemple d'utilisation

Modifier le fichier `config/app.php` pour rajouter ce qui suit :

```php
// Autoloaded Service Providers
'providers' => [
    ...
    Medlib\BookCover\Services\CoverServiceProvider::class,
],

// Class Aliases
'aliases' => [
    ...
    'Cover'   => Medlib\BookCover\Facades\Cover::class,
],
```

Au lieu d'enregistrer la couverture dans un fichier, vous pouvez également obtenir les données d'image et les affichées directement:

```php
header('Content-Type: image/png');
echo $cover->getImageBlob();
ou
echo $cover->getImageBase64();
```

### Exemples de couvertures

Voir `examples/examples.php` pour le code source des exemples de couverture.

![Cover 1](examples/cover1.png)
![Cover 2](examples/cover2.png)
![Cover 3](examples/cover3.png)
![Cover 4](examples/cover4.png)
