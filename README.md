# One Or Fail

[![Build Status](https://travis-ci.org/UniSharp/one-or-fail.svg?branch=master)](https://travis-ci.org/UniSharp/one-or-fail)
[![Coverage Status](https://coveralls.io/repos/github/UniSharp/one-or-fail/badge.svg?branch=master)](https://coveralls.io/github/UniSharp/one-or-fail?branch=master)

## Introduction

TBD ...

## Installation

To get started, install via the Composer package manager:

```bash
composer require unisharp/one-or-fail
```

Next, register the service provider in the providers array of your config/app.php configuration file:

```php
UniSharp\OneOrFail\OneOrFailServiceProvider::class,
```

## Usage

```php
$model = Model::where('key', 'value')->oneOrFail();
```
