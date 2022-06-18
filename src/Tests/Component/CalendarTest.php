<?php
namespace jorgelive\IcalBundle\Tests\Component;

use jorgelive\IcalBundle\Component\Calendar;
use jorgelive\IcalBundle\Tests\CalendarTestCase;

/**
 * Tests for calendar component
 *
 * @package jorgelive\IcalBundle\Tests
 * @author  jorge GOMEZ <gomez.valencia@outlook.com>
 */
class CalendarTest extends CalendarTestCase
{

    /**
     * Testing initiating calendar
     *
     */
    public function testInit()
    {
        $calendar = new Calendar();
        $this->assertCalendar($calendar);
    }

    /**
     * Testing filename calendar
     *
     */
    public function testSetGetFilename()
    {
        $calendar = new Calendar();
        $this->assertEquals('calendar.ics', $calendar->getFilename());

        $calendar->setFilename('test.ics');
        $this->assertEquals('test.ics', $calendar->getFilename());
    }

    /**
     * Testing contentType calendar
     *
     */
    public function testGetContentType()
    {
        $calendar = new Calendar();
        $this->assertEquals('text/calendar', $calendar->getContentType());
    }

    /**
     * Testing export calendar
     *
     */
    public function testExport()
    {
        $calendar = new Calendar();
        $this->assertStringStartsWith('BEGIN:VCALENDAR', $calendar->export());
    }

}
