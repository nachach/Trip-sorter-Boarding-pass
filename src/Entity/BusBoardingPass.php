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
 * Class BusBoardingPass
 *
 * BusBoardingPass extends BoardingPass.
 * For the moment Bus don't have specific information
 * But if needed in the future we can just add property and method here.
 */
class BusBoardingPass extends BoardingPass
{
    /**
     * Constructor for BusBaseBoardingPass
     *
     * We can delete it for the moment, but in the future if we add information we will use it.
     *
     * {@inheritdoc}
     */
    public function __construct($departure, $arrival, $number, $seat = null)
    {
        parent::__construct($departure, $arrival, $number, $seat);
    }

    /**
     * @inheritdoc
     */
    public function toString()
    {
        return 'Take the ' . $this->getNumber() . ' bus from ' . $this->getDeparture() . ' to ' . $this->getArrival() . '. ' . (!empty($this->getSeat()) ?  'Sit in seat ' . $this->getSeat() : 'No seat assignment.');
    }

}