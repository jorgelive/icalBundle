<?php

namespace jorgelive\IcalBundle\Tests;

use jorgelive\IcalBundle\Component\Calendar;

/**
 * Abstract calendar test case
 *
 * @package jorgelive\IcalBundle\Tests
 * @author  jorge GOMEZ <gomez.valencia@outlook.com>
 */
abstract class CalendarTestCase extends \PHPUnit_Framework_TestCase
{

    /**
     * Assert calendar configs
     *
     * @param Calendar $calendar Actual calendar
     */
    protected function assertCalendar($calendar)
    {
        $this->assertInstanceOf('jorgelive\IcalBundle\Component\Calendar', $calendar);
        $this->assertInstanceOf('Jsvrcek\ICS\Model\Calendar', $calendar);
    }
}
