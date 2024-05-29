Synchronizer
================

[![Latest Stable](http://img.shields.io/packagist/v/flamecore/synchronizer.svg)](https://packagist.org/packages/flamecore/synchronizer)
[![Scrutinizer](http://img.shields.io/scrutinizer/g/flamecore/synchronizer.svg)](https://scrutinizer-ci.com/g/flamecore/synchronizer)
[![License](http://img.shields.io/packagist/l/flamecore/synchronizer.svg)](https://packagist.org/packages/flamecore/synchronizer)

Эта библиотека позволяет легко синхронизировать самые разные вещи. Он имеет красивы     й и простой в использовании API.

Synchronizer был разработан в качестве серверной части для нашего инструмента разве     ртывания и тестирования [Seabreeze](https://github.com/FlameCore/Seabreeze).


Реализация
------------

Библиотека Synchronizer - это всего лишь абстрактная основа. Но доступные конкретные реализации: (только для версии 0.1.0)

* [FilesSynchronizer](https://github.com/FlameCore/FilesSynchronizer)
* [DatabaseSynchronizer](https://github.com/FlameCore/DatabaseSynchronizer)


Использование
----------------

Подключите к своему коду `autoload.php` и используйте классы:

```php
namespace Acme\MyApplication;

// To create a Synchronizer:
use Whatis\Synchronizer\AbstractSynchronizer;
use Whatis\Synchronizer\SynchronizerSourceInterface;
use Whatis\Synchronizer\SynchronizerTargetInterface;

// To make your project compatible with Synchronizer:
use Whatis\Synchronizer\SynchronizerInterface;

require 'vendor/autoload.php';
```

Создайте свой синхронизатор:

```php
class ExampleSynchronizer extends AbstractSynchronizer
{
    /**
     * Синхронизировать
     *
     * @param array $settings Настройки для синхронизации
     *
     * @return bool
     */
    public function synchronize(array $settings = []): bool
    {
        /// ... ЛОГИКА ...

        return true;
    }

    /**
     * Проверить, поддерживается ли источник
     *
     * @param SynchronizerSourceInterface $source Источник
     *
     * @return bool
     */
    public function supportsSource(SynchronizerSourceInterface $source): bool
    {
        return $source instanceof ExampleSource;
    }

    /**
     * Проверить, поддерживается ли цель
     *
     * @param SynchronizerTargetInterface $target Цель
     *
     * @return bool
     */
    public function supportsTarget(SynchronizerTargetInterface $target): bool
    {
        return $target instanceof ExampleTarget;
    }
}
```

Создайте источники и цели синхронизатора:

```php
class ExampleSource implements SynchronizerSourceInterface
{
    /**
     * Создать экземпляр источника
     *
     * @param array $settings Настройки
     */
    public function __construct(array $settings)
    {
        // ... Сохраняем настройки ...
    }

    // .. Методы источника ...
}

class ExampleTarget implements SynchronizerTargetInterface
{
    /**
     * Создать экземпляр цели
     *
     * @param array $settings Настройки
     */
    public function __construct(array $settings)
    {
        // ... Сохраняем настройки ...
    }

    // .. Методы цели ...
}
```

Создайте свой проект, совместимый с синхронизатором:

```php
class Application
{
    /**
     * Синхронизатор
     *
     * @var SynchronizerInterface
     */
    protected SynchronizerInterface $synchronizer;

    /**
     * Установить синхронизатор
     *
     * @param SynchronizerInterface $synchronizer Синхронизатор
     */
    public function setSynchronizer(SynchronizerInterface $synchronizer): static
    {
        $this->synchronizer = $synchronizer;
    }

    // ...
}
```


Установка
-----------

### Через Composer

[Install Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) если composer не установлен:

    $ curl -sS https://getcomposer.org/installer | php

Установите библиотеку, эта команда установит самую последнюю версию пакета

    $ composer require whatis/synchronizer


Требования
------------

* Ваша версия php должна быть не меньше 8.0


Участие
---------

Если хотите поучавствовать в разработке, пожалуйста, сначала прочитайте [CONTRIBUTING](CONTRIBUTING.md).
