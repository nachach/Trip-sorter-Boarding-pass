<?php
/**
 * Created by PhpStorm.
 * User: nachach
 * Date: 12/12/18
 * Time: 08:48
 */

namespace Nachach\TripSorter\Service;

use Nachach\TripSorter\Entity\Super\BoardingPass;
use Nachach\TripSorter\Exception\InvalidException;

/**
 * Class TripSorter
 *
 * The TripSorter have the logic to sort boarding passes.
 */
class TripSorter
{
    /**
     * @var array list of departures
     */
    private $departures;

    /**
     * @var array list of arrivals
     */
    private $arrivals;

    /**
     * @var array sorted list of boarding passes
     */
    private $sortedBoardingPasses = array();

    /**
     * sort function for an array of indeterminate number of boarding passes .
     *
     * @param array $steps
     *
     * @return array $sortedBoardingPasses
     * @throws InvalidException
     */
    public function sort(array $steps)
    {
        if (empty($steps)) {
            throw new InvalidException("Empty trip");
        }

        //construct arrays of departure and arrival
        $this->listDepartures($steps);
        $this->listArrival($steps);


        //found the first departure location
        try {
            $startingPoint = $this->getStartingPoint($steps);
        } catch (InvalidException $e) {
            return [$e->getMessage()];
        }

        $currentPoint = $startingPoint;

        while ($currentBoardingPass = (array_key_exists($currentPoint, $this->departures)) ? $this->departures[$currentPoint] : null) {

            // push current element in sorted array
            array_push($this->sortedBoardingPasses, $currentBoardingPass);

            // get current depart point
            $currentPoint = $currentBoardingPass->getArrival();
        }

        return $this->sortedBoardingPasses;
    }

    /**
     * create an array with all departure
     *
     * @param array $steps
     */
    private function listDepartures($steps)
    {
        /** @var BoardingPass $step */
        foreach ($steps as $step) {
            $this->departures[$step->getDeparture()] = $step;
        }
    }

    /**
     * create an array with all arrivals
     *
     * @param array $steps
     */
    private function listArrival($steps)
    {
        /** @var BoardingPass $step */
        foreach ($steps as $step) {
            $this->arrivals[$step->getArrival()] = $step;
        }
    }

    /**
     * found the starting point (departure which is not present as an arrival)
     *
     * @param array $steps
     * @return mixed
     * @throws InvalidException
     */
    private function getStartingPoint($steps)
    {
        /** @var BoardingPass $step */
        foreach ($steps as $step) {
            $depart = $step->getDeparture();

            if (!array_key_exists($depart, $this->arrivals)) {
                return $depart;
            }
        }

        throw new InvalidException("Broken trip");
    }

}