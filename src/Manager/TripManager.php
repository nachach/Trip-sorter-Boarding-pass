<?php
/**
 * Created by PhpStorm.
 * User: nachach
 * Date: 12/12/18
 * Time: 08:48
 */

namespace Nachach\TripSorter\Manager;

use Nachach\TripSorter\Exception\InvalidException;
use Nachach\TripSorter\Service\TripSorter;
use Nachach\TripSorter\Entity\Super\BoardingPass;

/**
 * Class TripManager
 *
 * This class is the manager of the trip.
 * We can add/remove element to the list of boarding passes
 * We can sort the list
 * We can display the full trip
 */
class TripManager
{
    /**
     * @var array
     */
    private $boardingPasses;

    /**
     * @var TripSorter
     */
    private $tripSorter;

    public function __construct()
    {
        $this->tripSorter = new TripSorter();
        $this->boardingPasses = array();
    }

    /**
     * @return array
     */
    public function getBoardingPasses()
    {
        return $this->boardingPasses;
    }


    /**
     * add an element to the boarding passes list
     *
     * @param BoardingPass $boardingPass
     */
    public function addBoardingPass(BoardingPass $boardingPass)
    {
        $this->boardingPasses[] = $boardingPass;
    }

    // TODO : add a removeBoardingPass method

    /**
     *
     * This method will display the full trip (in the current states of ordering)
     *
     * @return string description of the full trip
     */
    public function listBoardingPasses()
    {
        $trip = "Welcome! Below, you will find the summary on your trip:" . PHP_EOL;

        /** @var BoardingPass $boardingPass */
        foreach ($this->boardingPasses as $boardingPass) {
            $trip .= "    * " . $boardingPass->toString() . PHP_EOL ;
        }

        $trip .= "You have arrived at your final destination. Thank you" . PHP_EOL;

        return $trip;
    }

    /**
     * This method will sort the list of boarding passes
     */
    public function sortBoardingPasses()
    {
        try {
            $this->boardingPasses = $this->tripSorter->sort($this->boardingPasses);
        } catch (InvalidException $e) {
            return $e->getMessage();
        }
    }
}