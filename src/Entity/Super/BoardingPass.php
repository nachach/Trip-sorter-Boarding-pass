<?php
/**
 * Created by PhpStorm.
 * User: nachach
 * Date: 12/12/18
 * Time: 08:48
 */

namespace Nachach\TripSorter\Entity\Super;

/**
 * Class BoardingPass
 *
 * This base class describe the basic boarding pass with
 * commons informations to all kind of  means of transport
 *
 * Each mean of transport will extend this class and add his own information
 */
abstract class BoardingPass
{
    /**
     * @var string
     */
    protected  $departure;

    /**
     * @var string
     */
    protected  $arrival;

    /**
     * @var string
     */
    protected  $seat;

    /**
     * @var string
     */
    protected  $number;

    // TODO : Add departure and arrival time to calculate each time travel and total trip time

    /**
     * BoardingPass Constructor
     *
     * @param string $departure Departing point for a travel.
     * @param string $arrival   Arrival Location for a travel.
     * @param string $number    Number of the flight/train/bus...
     * @param string $seat      Seat number
     */
    public function __construct($departure, $arrival, $number, $seat = null)
    {
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->number= $number;
        $this->seat = $seat;
    }

    /**
     * @return string
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @param string $departure
     * @return BoardingPass
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
        return $this;
    }

    /**
     * @return string
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * @param string $arrival
     * @return BoardingPass
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param string $seat
     * @return BoardingPass
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return BoardingPass
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * method toString to resume the trip in readable sentence.
     */
    abstract public function toString();

}