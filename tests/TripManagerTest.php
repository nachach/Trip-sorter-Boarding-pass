<?php
/**
 * Created by PhpStorm.
 * User: nachach
 * Date: 12/12/18
 * Time: 10:59
 */

namespace Nachach\TripSorter\Test;

use Nachach\TripSorter\Entity\BusBoardingPass;
use Nachach\TripSorter\Entity\TrainBoardingPass;
use Nachach\TripSorter\Entity\PlaneBoardingPass;
use Nachach\TripSorter\Manager\TripManager;
use PHPUnit\Framework\TestCase;

/**
 * Class TripManagerTest
 */
class TripManagerTest extends TestCase
{
    public function testGetBoardingPasses()
    {
        $trip = new TripManager();
        $trip->addBoardingPass(new BusBoardingPass('Paris', 'Lyon', '007'));

        $this->assertEquals(count($trip->getBoardingPasses()), 1);
    }

    public function testAddBoardingPasses()
    {
        $trip = new TripManager();
        $this->assertEquals(count($trip->getBoardingPasses()), 0);

        $trip->addBoardingPass(new BusBoardingPass('Paris', 'Lyon', '007'));
        $this->assertEquals(count($trip->getBoardingPasses()), 1);
    }

    public function testListBoardingPasses()
    {
        $trip = new TripManager();
        $trip->addBoardingPass(new BusBoardingPass('Paris', 'Lyon', '007'));

        $waitingDescription = "Welcome! Below, you will find the summary on your trip:" . PHP_EOL
                            ."    * Take the 007 bus from Paris to Lyon. No seat assignment." . PHP_EOL
                            ."You have arrived at your final destination. Thank you" . PHP_EOL;

        $this->assertEquals($trip->listBoardingPasses(), $waitingDescription);
    }

    public function testSortNoBoardingPass()
    {
        $trip = new TripManager();

        $trip->sortBoardingPasses();

        $waitingDescription = "Welcome! Below, you will find the summary on your trip:" . PHP_EOL
                            ."You have arrived at your final destination. Thank you" . PHP_EOL;

        $this->assertEquals($trip->listBoardingPasses(), $waitingDescription);
    }

    public function testSortOneBoardingPass()
    {
        $trip = new TripManager();
        $trip->addBoardingPass(new BusBoardingPass('Paris', 'Lyon', '007'));

        $trip->sortBoardingPasses();

        $waitingDescription = "Welcome! Below, you will find the summary on your trip:" . PHP_EOL
                            ."    * Take the 007 bus from Paris to Lyon. No seat assignment." . PHP_EOL
                            ."You have arrived at your final destination. Thank you" . PHP_EOL;

        $this->assertEquals($trip->listBoardingPasses(), $waitingDescription);

    }

    public function testSortAlreadySort()
    {
        $trip = new TripManager();
        $trip->addBoardingPass(new BusBoardingPass('Paris', 'Lyon', '007'));
        $trip->addBoardingPass(new PlaneBoardingPass('Lyon', 'Marseille', 'FK3132', 'B22', '3', '12'));
        $trip->addBoardingPass(new TrainBoardingPass('Marseille', 'Toulon', '3132'));
        $trip->addBoardingPass(new BusBoardingPass('Toulon', 'Port', 'Airport'));

        $trip->sortBoardingPasses();

        $waitingDescription = "Welcome! Below, you will find the summary on your trip:" . PHP_EOL
                            ."    * Take the 007 bus from Paris to Lyon. No seat assignment." . PHP_EOL
                            ."    * From Lyon, take flight FK3132 to Marseille. Gate 3, seat B22. Your baggage will be dropped at ticket counter 12." . PHP_EOL
                            ."    * Take train 3132 from Marseille to Toulon. No seat assignment." . PHP_EOL
                            ."    * Take the Airport bus from Toulon to Port. No seat assignment." . PHP_EOL
                            ."You have arrived at your final destination. Thank you". PHP_EOL;

        $this->assertEquals($trip->listBoardingPasses(), $waitingDescription);
    }

    public function testSortNotSorted()
    {
        $trip = new TripManager();
        $trip->addBoardingPass(new TrainBoardingPass('Marseille', 'Toulon', '3132'));
        $trip->addBoardingPass(new BusBoardingPass('Paris', 'Lyon', '007'));
        $trip->addBoardingPass(new BusBoardingPass('Toulon', 'Port', 'Airport'));
        $trip->addBoardingPass(new PlaneBoardingPass('Lyon', 'Marseille', 'FK3132', 'B22', '3', '12'));

        $trip->sortBoardingPasses();

        $waitingDescription = "Welcome! Below, you will find the summary on your trip:" . PHP_EOL
                            ."    * Take the 007 bus from Paris to Lyon. No seat assignment." . PHP_EOL
                            ."    * From Lyon, take flight FK3132 to Marseille. Gate 3, seat B22. Your baggage will be dropped at ticket counter 12." . PHP_EOL
                            ."    * Take train 3132 from Marseille to Toulon. No seat assignment." . PHP_EOL
                            ."    * Take the Airport bus from Toulon to Port. No seat assignment." . PHP_EOL
                            ."You have arrived at your final destination. Thank you". PHP_EOL;

        $this->assertEquals($trip->listBoardingPasses(), $waitingDescription);
    }
}