<?php
require_once 'class/DBConnect.php';
require_once 'class/ContactManager.php';
require_once 'class/Command.php';

$command = new Command(new ContactManager(DBConnect::getPDO()));

while (true) {
    $line = readline("Entrez votre commande : ");
    if ($line === 'exit') {
        break;
    }elseif ($line === 'init') {
        $command->init();
    }
    if ($line === 'list') {
       $command->list();
    }elseif (preg_match('/detail (\d+)/', $line, $matches)) {
        $command->detail((int)$matches[1]);
    }elseif (preg_match('/create ([^,]+), ([^,]+), ([^,]+)/', $line, $matches)) {
        $command->create($matches[1], $matches[2], $matches[3]);
    }elseif (preg_match('/delete (\d+)/', $line, $matches)) {
        $command->delete((int)$matches[1]);
    }elseif (preg_match('/modify (\d+), ([^,]+), ([^,]+), ([^,]+)/', $line, $matches)) {
        $command->modify((int)$matches[1], $matches[2], $matches[3], $matches[4]);
    }elseif ($line === 'help') {
        $command->help();
    }else {
        $command->help();
    }
}