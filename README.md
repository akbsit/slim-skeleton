# slim-skeleton, [Packagist](https://packagist.org/packages/akbsit/slim-skeleton)

Framework PHP application based on Slim Framework.

Includes packages:

* [slim/slim](https://packagist.org/packages/slim/slim);
* [slim/twig-view](https://packagist.org/packages/slim/twig-view);
* [slim/csrf](https://packagist.org/packages/slim/csrf);
* [illuminate/validation](https://packagist.org/packages/illuminate/validation).

To install the application, you need to deploy it in your working folder:

```
composer create-project akbsit/slim-skeleton ./ "1.*"
```

Create an environment settings file based on the example `.env.example`, for local environment `.env.local`, for production `.env.production`.

The local environment is defined by subdomains: `.loc` и `.local`.

## Adding settings

Application uses two types of settings:

* Required (without their definition in `.env.local` and `.env.production` the application will not start);
* Optional.

> All settings names are converted to upper case.

### Adding required settings

The required set of settings can be supplemented in the environment definition file `src/Env.php` - the `$arRequiredParams` parameter (it is important not to delete the default settings as they are used in the application). After that, all added settings will need to be defined in the configuration file `configs/app.php` by analogy.

> It is not recommended to use this method!

### Adding optional settings

To add your own set, you will need to create a file with an arbitrary name in the `configs` folder and with the contents:

```
custom_config.php
```

```php
return [
    'CONFIG_NAME_1' => 'CONFIG_VALUE_1',
    'CONFIG_NAME_2' => 'CONFIG_VALUE_2',
    'CONFIG_NAME_3' => 'CONFIG_VALUE_3',
    'CONFIG_NAME_4' => 'CONFIG_VALUE_4'
];
```

After which the settings will be available in the application. The file name is a key in the `config` array. Example of use in a controller:

```php
$this->config->CUSTOM_CONFIG['CONFIG_NAME_1']
```
