# slim-skeleton, [Packagist](https://packagist.org/packages/falbar/slim-skeleton)

Каркас PHP приложения на основе Slim Framework.

В каркас входят пакеты:

* [slim/slim](https://packagist.org/packages/slim/slim);
* [slim/twig-view](https://packagist.org/packages/slim/twig-view);
* [slim/csrf](https://packagist.org/packages/slim/csrf);
* [illuminate/validation](https://packagist.org/packages/illuminate/validation).

Для установки приложения нужно его развернуть в рабочей папке:

```
composer create-project falbar/slim-skeleton ./ "1.*"
```

Создать файл настроек среды по образцу `.env.example`, для локальной среды `.env.local`, a для боевой `.env.production`.

Локальная среда определяется по поддоменам: `.loc` и `.local`.

## Добавление настроек

В приложение используются два вида настроек:

* Обязательные (без их определения в `.env.local` и `.env.production` не запуститься приложение);
* Не обязательные.

> Все названия настроек приводятся к верхнему регистру.

### Добавление обязательных настроек

Обязательный набор настроек можно дополнить в файле определения среды `src/Env.php` - параметр `$arRequiredParams` (важно не удалять установленные по умолчанию настройки так как они используется в приложение). После чего все добавленные настройки нужно будет определить в конфигурационном файле `configs/app.php` по аналогии.

> Не рекомендуется использовать данных способ!

### Добавление не обязательных настроек

Для добавления своего набора, потребуется создать файл с произвольным названием в папке `configs` и с содержимым:

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

После чего настройки будут доступны в приложение. Имя файла является ключом в массиве `config`. Пример использования в контроллере:

```php
$this->config->CUSTOM_CONFIG['CONFIG_NAME_1']
```