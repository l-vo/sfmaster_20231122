<p align="center"><a href="https://symfony.com" target="_blank">
    <img width=150 src="https://university.sensiolabs.com/images/sl-university-guy.png?sluv=98dbece26fd5a0434eea5e0577258d36eedf2db8">
</a></p>

# SensioTV+

**"SensioTV+"** is a reference application created for Symfony 5 training sessions to show how to develop applications following the Symfony Best Practices, according to SensioLabs University courses.

**Each branch is equal to a Symfony training session.**

## Installation instructions

### Project requirements

- [PHP ^7.2.9 or higher](http://php.net/manual/fr/install.php)
- PDO-SQLite PHP extension enabled;
- [Symfony CLI](https://symfony.com/download)
- [Composer](https://getcomposer.org/download)
- and the [usual Symfony application requirements][1].

### Project view

![Home page from SensioTV+ application](data/sensiotv_readme_screenshot.png?raw=true "Home page")

### Installation

1. Clone the current repository:
```bash
$ git clone ''
```

2. Move in and create one global `.env.local` or few `.env.{environment}.local` files according to your environments with your default configuration.
**This one is not committed to the shared repository.**
> `.env` equals to the last `.env.dist` file before [november 2018][2].

3. a. Execute these commands below into your working folder to install the project:
```bash
$ composer install
$ composer update
```

3 .b. Or just call the Makefile's install rule :
```bash
$ make install
```

> The project's Makefile has few rules which could be very useful. 
> In fact, you have some rules for Q&A tools and unit/functional tests.
> Take a look on it !

## Usage

```bash
$ cd sensiotv
$ symfony serve --no-tls
```

[1]: https://symfony.com/doc/current/reference/requirements.html
[2]: https://symfony.com/doc/current/configuration.html#managing-multiple-env-files
