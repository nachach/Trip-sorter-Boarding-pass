<?php
/**
 * Created by PhpStorm.
 * User: nachach
 * Date: 12/12/18
 * Time: 08:51
 */

namespace Nachach\TripSorter\Entity;

use Nachach\TripSorter\Entity\Super\BoardingPass;

/**
 * Class PlaneBoardingPass
 *
 * TrainBoardingPass extends BoardingPass.
 *
 * Plane have a gate and a counter additional information
 */
class PlaneBoardingPass extends BoardingPass
{
    /**
     * @var string
     */
    protected  $gate;

    /**
     * @var string
     */
    protected  $counter;

    /**
     * Constructor for TrainBaseBoardingPass
     *
     * We can delete it for the moment, but in the future if we add information we will use it.
     *
     * @param string $departure Departing point for a travel.
     * @param string $arrival   Arrival Location for a travel.
     * @param string $number    Number of the flight/train/bus...
     * @param string $seat      Seat number.
     * @param string gate       Gate number.
     * @param string $counter   Counter number.
     */
    public function __construct($departure, $arrival, $number, $seat = null, $gate, $counter = null)
    {
        parent::__construct($departure, $arrival, $number, $seat);

        $this->gate = $gate;
        $this->counter = $counter;
    }

    /**
     * @return string
     */
    public function getGate()
    {
        return $this->gate;
    }

    /**
     * @param string $gate
     */
    public function setGate($gate)
    {
        $this->gate = $gate;
    }

    /**
     * @return string
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * @param string $counter
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;
    }

    /**
     * @inheritdoc
     */
    public function toString()
    {
        return 'From ' . $this->getDeparture() . ', take flight ' . $this->getNumber() . ' to ' . $this->getArrival() . '. Gate ' . $this->getGate() .', seat ' . $this->getSeat() . '. ' . ($this->counter ? 'Your baggage will be dropped at ticket counter ' . $this->counter . '.' : 'Yout baggage will be automatically transferred from your last leg.');
    }

}