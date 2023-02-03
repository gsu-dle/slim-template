# gsu-dle/slim-template

Use this application template to quickly setup and start working on a new Slim 4 application. This application uses the latest Slim 4 with Slim PSR-7 implementation and PHP-DI container implementation. It also uses the Monolog logger.

This application template was built for Composer. This makes setting up a new Slim application quick and easy.

See [gsu-dle/slim](https://github.com/gsu-dle/slim) for more details.

## Install the Application

Run this command from the directory in which you want to install your new Slim application. You will require PHP 8.1 or newer.

```bash
composer create-project gsu-dle/slim-template [my-app-name]
```

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

- Point your virtual host document root to your new application's `public/` directory.
- Ensure `logs/` is web writable.

To run the application in development, you can run these commands 

```bash
cd [my-app-name]
composer start
```

Run this command in the application directory to run the test suite

```bash
composer test
```

## Credits

- [Melody Forest](https://github.com/mforest-gsu)
- [Jeb Barger](https://github.com/jebba2)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.