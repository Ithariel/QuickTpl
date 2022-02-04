# QuickTpl
Make config files quick and dirty with templates

### Installation

    composer install
    composer bin box require --dev humbug/box
    vendor/bin/box compile

### Usage

Just create a template/ directory. In it create two files

    some-name.twig
    some-name.conf.php

Where some-name is whatever you want to name it. Then just run

    ./quicktpl.phar some-name