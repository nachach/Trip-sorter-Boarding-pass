<?php
/**
 * Created by PhpStorm.
 * User: nachach
 * Date: 12/12/18
 * Time: 10:59
 */

namespace Nachach\TripSorter\Test;

use Nachach\TripSorter\Entity\PlaneBoardingPass;
use PHPUnit\Framework\TestCase;

/**
 * Class PlaneBoardingPassTest
 */
class PlaneBoardingPassTest extends TestCase
{
    public function testReturnTextWithCounter()
    {
        $planeBoardingPass = new PlaneBoardingPass('Paris', 'Rouen', "007", "3A", "45B", "344");

        $waitingText = 'From Paris, take flight 007 to Rouen. Gate 45B, seat 3A. Your baggage will be dropped at ticket counter 344.';

        $this->assertEquals($planeBoardingPass->toString(), $waitingText);
    }

    public function testReturnTextWithoutCounter()
    {
        $planeBoardingPass = new PlaneBoardingPass('Paris', 'Rouen', "007", "3A", "45B");

        $waitingText = 'From Paris, take flight 007 to Rouen. Gate 45B, seat 3A. Yout baggage will be automatically transferred from your last leg.';

        $this->assertEquals($planeBoardingPass->toString(), $waitingText);
    }
}