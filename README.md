Simpler PHP Encrypt & Decrypt
==============================

Very handy and simpler PHP Encryption and Decryption 


## Install

Via Composer

``` bash
$ composer require tuhin18003/simpler-php-encrypt-decrypt
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

### Production - Different approach
Get the encrypted and decrypted string without handling the Cipher and Key

## Encryption

You can use your own joiner in advance or leave the second parameter of the function blank. This will make your string more secure.

```
use Tuhin18003\SimPhpEnDecrypt\Builder

$encryptedToken = Builder::getEncryptedToken('test', "__");

```

Without joiner:

```
use Tuhin18003\SimPhpEnDecrypt\Builder

$encryption = Builder::getEncryptedToken('test');

```

## Output 
It returns a encrypted token

```
aDhaRFZjK2Z1WWlQa1NkSnRINXJMaE85TnhBT2tTQWxTaDJ1eHdmeVl3MD0=__MjkyMjA4MzBhYWZkY2YyNjYyYzU0YWQ2Y2VkMjJkZjI0YTcyMGFjM2QxMDdhZTc3NzA2MGFjOGRhZDA3MTc0OV9fX2Q2NzEwNzc0OWE0MmU4NDI=

```

## Decryption

if you have used your custom joiner, please use it here again

```
use Tuhin18003\SimPhpEnDecrypt\Builder

Builder::getDecryptedToken( $encryptedToken, "__");

```

Or keep blank the second parameter

```
use Tuhin18003\SimPhpEnDecrypt\Builder

Builder::getDecryptedToken( $encryptedToken );

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

