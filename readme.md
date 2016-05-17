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

```
composer require anekdotes/support
```

## Usage

Use the class where ever you need it:

```
use Anekdotes\Support\Arr;
```

or

```
use Anekdotes\Support\Str;
```

or

```
use Anekdotes\Support\UUID;
```

or

```
use Anekdotes\Support\I18n;
```

#### Arr

Helper class which facilitates array manipulation.

Method `sortByKey` (*_array_, *_string_, _enum_)

```
Arr::sortByKey([['id' => 2],['id' => 1],['id' => 3]], 'id');
// [['id' => 1],['id' => 2],['id' => 3]]

Arr::sortByKey([['id' => 2],['id' => 1],['id' => 3]], 'id', SORT_DESC);
// [['id' => 3],['id' => 2],['id' => 1]]
```

Method `get` (*_array_, *_string_, _string_)

```
Arr::get(['id'=>1, 'title'=>'foo'], 'title');
// foo

Arr::get(['id'=>1, 'title'=>'foo'], 'bar', 'toaster');
// toaster
```

Method `getWhere` (*_array_, *_string_, *_string_, _string_)

```
$dummy = [
    ['id' => 1, 'name' => 'Bell'],
    ['id' => 2, 'name' => 'Lani']
];
Arr::getWhere($dummy, 'name', 'Lani');
// ['id' => 2, 'name' => 'Lani']
```

Method `exists` (*_string_, *_array_)

```
Arr::exists('title', ['id'=>1, 'title'=>'foo']);
// true

Arr::exists('bar', ['id'=>1, 'title'=>'foo']);
// false
```

Method `remove` (*_string_, *_array_)

```
$dummy = ['id'=>1, 'title'=>'foo'];
Arr::remove('title', $dummy);
$dummy // ['id'=>1]

$dummy = ['id'=>1, 'title'=>'foo'];
Arr::remove('foo', $dummy);
$dummy // ['id'=>1, 'title'=>'foo']
```

#### Arr

Contains helper functions used to manipulate strings.

Method  `startsWith` (*_string_, *_string_)

```
Str::startsWith('foo', 'f');
// true
```

Method  `endsWith` (*_string_, *_string_)

```
Str::endsWith('foo', 'o');
// true
```

Method  `split` (*_string_, *_string_)

```
Str::split(',', '1,2,3,4,5');
// [1, 2, 3, 4, 5]
```

Method  `capitalize` (*_string_)

```
Str::capitalize('foo');
// Foo
```

Method  `upper` (*_string_)

```
Str::upper('foo');
// FOO
```

Method  `lower` (*_string_)

```
Str::lower('FOO');
// foo
```

Method  `snakeCase` (*_string_)

```
Str::snakeCase('étoile filante');
// etoile_filante
```

Method  `camelCase` (*_string_)

```
Str::camelCase('foo bar');
// fooBar
```

Method  `contains` (*_string_, *_string_)

```
Str::contains('foo', 'oo');
// true
```

Method  `studly` (*_string_)

```
Str::studly('foo bar');
// FooBar
```

Method  `ascii` (*_string_)

```
Str::ascii('étoile');
// etoile
```

Method  `slug` (*_string_, _string_)

```
Str::slug('foo bar');
// foo-bar
```

Method  `random` (*_integer_)

```
Str::random();
// random 16 characters string

Str::random(20);
// random 20 characters string
```

Method  `quickRandom` (*_integer_)

```
Str::quickRandom();
// random quick 16 characters string

Str::quickRandom(20);
// random quick 20 characters string
```

Method  `replace` (*_string_, *_string_, *_string_)

```
Str::replace('foo', 'oo', 'yy');
// fyy
```

Method  `regexResult` ()

```
Str::regexResult('/([\w]+)/', 'foo bar', 0);
// ['foo', 'bar']
```
