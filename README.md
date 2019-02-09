# phpenv
Class for storing and reading environment variables from ".env" file.

## Installation

To install the package using composer run `composer require codebot/phpenv:1.0.*`

## Usage
You need to create the ".env" file in your project root and define your environment variables there.  
Project root is the directory returned by `$_SERVER['DOCUMENT_ROOT']` variable.  
If you want to store the .env file somewhere else, you can pass the full path of your .env file as a first argument of `getInstance()` method, e.g. `Env\Core\Env::getInstance( '/path/to/.env' )`.

Example of the .env file:

```
APP_NAME=phpenv
APP_ENV=local
```

Example of the usage:

```php
$env = Env\Env::getInstance();

$env->get('APP_ENV');
```
