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
 * Class TrainBoardingPass
 *
 * TrainBoardingPass extends BoardingPass.
 * For the moment Train don't have specific information
 * But if needed in the future we can just add property and method here.
 */
class TrainBoardingPass extends BoardingPass
{
    /**
     * Constructor for TrainBaseBoardingPass
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
        return 'Take train ' . $this->getNumber() . ' from ' . $this->getDeparture() . ' to ' . $this->getArrival() . '. ' . (!empty($this->getSeat())  ?  'Sit in seat ' . $this->getSeat() : 'No seat assignment.');
    }

}