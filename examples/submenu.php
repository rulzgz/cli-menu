<?php

use MikeyMike\CliMenu\CliMenu;
use MikeyMike\CliMenu\CliMenuBuilder;

require_once(__DIR__ . '/../vendor/autoload.php');

$itemCallable = function (CliMenu $menu) {
    echo $menu->getSelectedItem()->getText();
};

$menu = (new CliMenuBuilder)
    ->setTitle('CLI Menu')
    ->addItem('First Item')
    ->addItemCallable($itemCallable)
    ->addSubMenuAsAction('Options')
        ->setTitle('CLI Menu > Options')
        ->addItem('First option')
        ->addItemCallable($itemCallable)
        ->setWidth(70)
        ->setBackgroundColour('green')
        ->end()
    ->setWidth(70)
    ->setBackgroundColour('yellow')
    ->build();

$menu->display();
