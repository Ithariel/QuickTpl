# QuickTpl
Make config files quick and dirty with templates

### Installation

Make sure you have PHP >= 7.1 and Composer installed

    git clone https://github.com/Ithariel/QuickTpl.git
    cd QuickTpl
    composer install

### Usage

Just create a template/ directory. In it create two files

    some-name.twig
    some-name.conf.php

Where some-name is whatever you want to name it. Then just run

    php index.php some-name

### Optional Phar

If you want a single phar file you can compile it with box

    composer bin box require --dev humbug/box
    vendor/bin/box compile

You will find the output in bin/