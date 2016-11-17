# Anekdotes Support

[![Latest Stable Version](https://poser.pugx.org/anekdotes/support/v/stable)](https://packagist.org/packages/anekdotes/support)
[![Build Status](https://travis-ci.org/anekdotes/support.svg?branch=master)](https://travis-ci.org/anekdotes/support)
[![codecov.io](https://codecov.io/gh/anekdotes/support/branch/master/graph/badge.svg)](https://codecov.io/github/anekdotes/support?branch=master)
[![StyleCI](https://styleci.io/repos/57908788/shield?style=flat)](https://styleci.io/repos/57908788)
[![License](https://poser.pugx.org/anekdotes/support/license)](https://packagist.org/packages/anekdotes/support)
[![Total Downloads](https://poser.pugx.org/anekdotes/support/downloads)](https://packagist.org/packages/anekdotes/support)

Utility classes meant to facilitate object manipulation

## Installation

Install via composer into your project:

```php
composer require anekdotes/support
```

## Usage

Use the class where ever you need it:

```php
use Anekdotes\Support\Arr;
```

or

```php
use Anekdotes\Support\Str;
```

or

```php
use Anekdotes\Support\UUID;
```

or

```php
use Anekdotes\Support\I18n;
```

#### Arr

Helper class which facilitates array manipulation.

Method `sortByKey` (*_array_, *_string_, _enum_)

```php
Arr::sortByKey([['id' => 2],['id' => 1],['id' => 3]], 'id');
// [['id' => 1],['id' => 2],['id' => 3]]

Arr::sortByKey([['id' => 2],['id' => 1],['id' => 3]], 'id', SORT_DESC);
// [['id' => 3],['id' => 2],['id' => 1]]
```

Method `get` (*_array_, *_string_, _string_)

```php
Arr::get(['id'=>1, 'title'=>'foo'], 'title');
// foo

//With default param if non is found
Arr::get(['id'=>1, 'title'=>'foo'], 'bar', 'toaster');
// toaster
```

Method `getWhere` (*_array_, *_string_, *_string_, _string_)

```php
$dummy = [
    ['id' => 1, 'name' => 'Bell'],
    ['id' => 2, 'name' => 'Lani']
];
Arr::getWhere($dummy, 'name', 'Lani');
// ['id' => 2, 'name' => 'Lani']
```

Method `exists` (*_string_, *_array_)

```php
Arr::exists('title', ['id'=>1, 'title'=>'foo']);
// true

Arr::exists('bar', ['id'=>1, 'title'=>'foo']);
// false
```

Method `remove` (*_string_, *_array_)

```php
$dummy = ['id'=>1, 'title'=>'foo'];
Arr::remove('title', $dummy);
$dummy // ['id'=>1]

$dummy = ['id'=>1, 'title'=>'foo'];
Arr::remove('foo', $dummy);
$dummy // ['id'=>1, 'title'=>'foo']
```

#### Str

Contains helper functions used to manipulate strings.

Method  `startsWith` (*_string_, *_string_)

```php
Str::startsWith('foo', 'f');
// true
```

Method  `endsWith` (*_string_, *_string_)

```php
Str::endsWith('foo', 'o');
// true
```

Method  `split` (*_string_, *_string_)

```php
Str::split(',', '1,2,3,4,5');
// [1, 2, 3, 4, 5]
```

Method  `capitalize` (*_string_)

```php
Str::capitalize('foo');
// Foo
```

Method  `upper` (*_string_)

```php
Str::upper('foo');
// FOO
```

Method  `lower` (*_string_)

```php
Str::lower('FOO');
// foo
```

Method  `snakeCase` (*_string_)

```php
Str::snakeCase('étoile filante');
// etoile_filante
```

Method  `camelCase` (*_string_)

```php
Str::camelCase('foo bar');
// fooBar
```

Method  `contains` (*_string_, *_string_)

```php
Str::contains('foo', 'oo');
// true
```

Method  `studly` (*_string_)

```php
Str::studly('foo bar');
// FooBar
```

Method  `ascii` (*_string_)

```php
Str::ascii('étoile');
// etoile
```

Method  `slug` (*_string_, _string_)

```php
Str::slug('foo bar');
// foo-bar
```

Method  `random` (*_integer_)

```php
Str::random();
// random 16 characters string

Str::random(20);
// random 20 characters string
```

Method  `quickRandom` (*_integer_)

```php
Str::quickRandom();
// random quick 16 characters string

Str::quickRandom(20);
// random quick 20 characters string
```

Method  `replace` (*_string_, *_string_, *_string_)

```php
Str::replace('foo', 'oo', 'yy');
// fyy
```

Method  `regexResult` ()

```php
Str::regexResult('/([\w]+)/', 'foo bar', 0);
// ['foo', 'bar']
```
