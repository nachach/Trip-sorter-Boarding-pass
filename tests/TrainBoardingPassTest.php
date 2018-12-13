<?php
/**
 * Created by PhpStorm.
 * User: nachach
 * Date: 12/12/18
 * Time: 10:59
 */

namespace Nachach\TripSorter\Test;

use Nachach\TripSorter\Entity\TrainBoardingPass;
use PHPUnit\Framework\TestCase;

/**
 * Class TrainBoardingPassTest
 */
class TrainBoardingPassTest extends TestCase
{
    public function testReturnTextWithSeat()
    {
        $trainBoardingPass = new TrainBoardingPass('Paris', 'Rouen', "007", "3A");

        $waitingText = 'Take train 007 from Paris to Rouen. Sit in seat 3A';

        $this->assertEquals($trainBoardingPass->toString(), $waitingText);
    }

    public function testReturnTextWithoutSeat()
    {
        $trainBoardingPass = new TrainBoardingPass('Paris', 'Rouen', "007");

        $waitingText = 'Take train 007 from Paris to Rouen. No seat assignment.';

        $this->assertEquals($trainBoardingPass->toString(), $waitingText);
    }
}