Simpler PHP Encrypt & Decrypt
==============================

Very handy and simpler PHP Encryption and Decryption 


## Install

Via Composer

``` bash
$ composer require simpler-php-encrypt-decrypt
```

## Usage
Include the autoload file in your working file..

```
require './vendor/autoload.php';
```

## Encryption

```
use Tuhin18003\SimPhpEnDecrypt\Builder

$encryption = Builder::encrypt('test');

```

## Output
It returns an array with cipher and key

```
Array ( [cipher] => SWlPb2ZQN1ZDRlJXb2JwRXdOVmtmZz09 [key] => MTk2OGEyOTdlE0M2RkMjhkZGRlOTQxMTk= )

```

## Decryption

```
use Tuhin18003\SimPhpEnDecrypt\Builder

Builder::decrypt( $encryption['cipher'], $encryption['key'] );

```

## Output
It returns the original string

```
test

```


### Credentials
- *Created by - [M.Tuhin](https://codesolz.net/)*

<a href="https://codesolz.net">
  <img src="https://codesolz.net/images/brand-logo/logo.png" alt="codesolz.net"/>
</a>

