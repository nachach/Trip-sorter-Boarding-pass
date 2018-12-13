<?php

namespace Nachach\TripSorter;

require_once __DIR__ . '/vendor/autoload.php';

use Nachach\TripSorter\Entity\BusBoardingPass;
use Nachach\TripSorter\Entity\TrainBoardingPass;
use Nachach\TripSorter\Entity\PlaneBoardingPass;
use Nachach\TripSorter\Manager\TripManager;

// list of all boarding passes
$trip = new TripManager();
$trip->addBoardingPass(new PlaneBoardingPass('Gerona', 'Stockholm', 'SK455', '3A', '45B', '344'));
$trip->addBoardingPass(new BusBoardingPass('Barcelona', 'Gerona', 'Airport'));
$trip->addBoardingPass(new PlaneBoardingPass('Stockholm', 'New York JFK', 'SK22', '7B', '22'));
$trip->addBoardingPass(new TrainBoardingPass('Madrid', 'Barcelona', '78A', '45B'));

$trip->sortBoardingPasses();

echo $trip->listBoardingPasses();
