 








A walk in phpUnit

Simply add a dependency on phpunit/phpunit to your project's composer.json file if you use Composer to manage the dependencies of your project. Here is a minimal example of a composer.json file that just defines a development-time dependency on PHPUnit 4.1:

{
    "require-dev": {
        "phpunit/phpunit": "4.1.*"
    }
}

For a system-wide installation via Composer, you can run:

composer global require "phpunit/phpunit=4.1.*"

Make sure you have ~/.composer/vendor/bin/ in your path. 