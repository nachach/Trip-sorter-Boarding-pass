<?php

namespace Nachach\TripSorter;

require_once __DIR__ . '/vendor/autoload.php';

use Nachach\TripSorter\Entity\BusBoardingPass;
use Nachach\TripSorter\Entity\TrainBoardingPass;
use Nachach\TripSorter\Entity\PlaneBoardingPass;
use Nachach\TripSorter\Manager\TripManager;

// list of all boarding passes
$trip = new TripManager();
$trip->addBoardingPass(new BusBoardingPass('Paris', 'Lyon', '007'));
$trip->addBoardingPass(new PlaneBoardingPass('Lyon', 'Marseille', 'FK3132', 'B22', '3', '12'));
$trip->addBoardingPass(new TrainBoardingPass('Marseille', 'Toulon', '3132'));
$trip->addBoardingPass(new BusBoardingPass('Toulon', 'Port', 'Airport'));

$trip->sortBoardingPasses();

echo $trip->listBoardingPasses();
