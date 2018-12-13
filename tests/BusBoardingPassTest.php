<?php
/**
 * Created by PhpStorm.
 * User: nachach
 * Date: 12/12/18
 * Time: 10:59
 */

namespace Nachach\TripSorter\Test;

use Nachach\TripSorter\Entity\BusBoardingPass;
use PHPUnit\Framework\TestCase;

/**
 * Class BusBoardingPassTest
 */
class BusBoardingPassTest extends TestCase
{
    public function testReturnTextWithSeat()
    {
        $busBoardingPass = new BusBoardingPass('Paris', 'Rouen', "Airport", "3A");

        $waitingText = 'Take the Airport bus from Paris to Rouen. Sit in seat 3A';

        $this->assertEquals($busBoardingPass->toString(), $waitingText);
    }

    public function testReturnTextWithoutSeat()
    {
        $busBoardingPass = new BusBoardingPass('Paris', 'Rouen', "Airport");

        $waitingText = 'Take the Airport bus from Paris to Rouen. No seat assignment.';

        $this->assertEquals($busBoardingPass->toString(), $waitingText);
    }
}