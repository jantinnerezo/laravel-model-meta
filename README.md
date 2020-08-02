# Laravel Model Meta

A very basic and simple metable trait that adds additional fields to your existing eloquent models. Main purpose for this package is the ability to add meta fields for MySQL versions lower than 5.7 without using MySQL JSON fields.

I used it personally for my projects that is hosted with MySQL version lower than 5.7. I recommend using other packages that supports MySQL JSON fields if your project's MySQL version is 5.7 only.

## Installation

You can install the package via composer:

```bash

composer require jantinnerezo/laravel-model-meta

```

## Usage

Create a migration that adds new field called "meta" to your existing table and then add the Metable trait to the model.

```php

use Jantinnerezo\LaravelModelMeta\Metable;


class YourModel extends Model
{
	use Metable;
}

```

### Set meta

```php

$yourModel = YourModel::find(1);
$yourModel->setMeta(
	'intro',  // Key
	"Hey Jude, don't make it bad!" // Value
);

```

### Sync multiple meta

```php

$yourModel = YourModel::find(1);
$yourModel->syncMeta([
	'key1' => 'First key',
	'key2' => 'Second key'
]);

```

### Remove meta

```php

$yourModel = YourModel::find(1);
$yourModel->removeMeta('key');

```

### Get single meta

```php

$yourModel = YourModel::find(1);
$yourModel->getMeta('key');

```

### Get multiple meta

```php

$yourModel = YourModel::find(1);
$yourModel->getMetaOnly(['key1','key2']);

```

### Get all meta

```php

$yourModel = YourModel::find(1);
$yourModel->getAllMeta();

```

### Testing

```bash

composer test

```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email erezojantinn@gmail.com instead of using the issue tracker.

## Credits

-   [Jantinn Erezo](https://github.com/jantinnerezo)

-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
