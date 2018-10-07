# slim-skeleton

Каркас PHP приложения на основе Slim Framework.

В каркас приложения входят пакеты:

* slim/slim;
* slim/twig-view;
* slim/csrf;
* illuminate/validation.

Для установки приложения нужно клонировать его в папку, например `skeleton.loc`:

```
git clone git@github.com:falbarRu/slim-skeleton.git ./
```

Запустить композер:

```
composer install
```

Создать файл настроек среды по образцу `.env.example`, для локальной среды `.env.local`, a для боевой `.env.production`.