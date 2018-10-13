# slim-skeleton

Каркас PHP приложения на основе Slim Framework.

В каркас входят пакеты:

* [slim/slim](https://packagist.org/packages/slim/slim);
* [slim/twig-view](https://packagist.org/packages/slim/twig-view);
* [slim/csrf](https://packagist.org/packages/slim/csrf);
* [illuminate/validation](https://packagist.org/packages/illuminate/validation).

Для установки приложения нужно его развернуть в рабочей папке:

```
composer create-project falbar/slim-skeleton ./
```

Создать файл настроек среды по образцу `.env.example`, для локальной среды `.env.local`, a для боевой `.env.production`.

Локальная среда определяется по поддоменам: `.loc` и `.local`.