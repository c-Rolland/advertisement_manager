<?php

/*
 * This file is part of the "Advertisements Manager" project.
 *
 * (c) 2020 - crolland.fr
 */

/* ============== Bootstrap ================== */

require_once 'DatabaseManager.php';
require_once 'MainController.php';
require_once 'Templates.php';

/* ============== Bootstrap ================== */

/* ============== Boot App ================ */

$databaseManager = new \AdvertisementsManagerApp\DatabaseManager();
$template = new \AdvertisementsManagerApp\Templates();
$mainController = new \AdvertisementsManagerApp\MainController($databaseManager, $template);

$mainController->boot();

/* ============== Boot App ================ */
