Strukt Tests
===

### Installation

```sh
composer require strukt/pkg-tests:v1.0.1
```

## Getting Started

Project `strukt/pkg-tests` is a `strukt` module.

### Installation

Install and publish `strukt/pkg-tests`:

```sh
console generate:app nameofyourapp
composer require strukt/pkg-tests
console publish:package pkg-tests
```

There is a list of console commands for preparing your authentication.

```sh
$ ./console -l

Strukt Console
==============
...
...
PhpUnit
 test:ls           List Tests 
 test:run          Execute Tests
```
## Package Development

This package will require installation into your `app/src/{{AppName}}` folder.
The `publish:package` command takes argument `package` if you inicate key `package` in 
your `cfg/repo.php` file for value `Strukt\Package\PkgTests::class`. Since your source 
will be in the root folder in a subfolder called `package` it will allow the publisher 
to install files in the your app source folder `app/src`.

```sh
./console publish:package package
```
Have a good one!
