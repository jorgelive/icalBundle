<?php

namespace jorgelive\IcalBundle\Tests\Response;

use jorgelive\IcalBundle\Component\Calendar;
use jorgelive\IcalBundle\Response\CalendarResponse;
use jorgelive\IcalBundle\Tests\CalendarTestCase;

/**
 * Tests for CalendarResponse
 *
 * @package jorgelive\IcalBundle\Tests\Response
 * @author  jorge GOMEZ <gomez.valencia@outlook.com>
 */
class CalendarResponseTest extends CalendarTestCase
{
    /**
     * Testing calendar response
     *
     */
    public function testCalendarResponse()
    {
        $calendar = new Calendar();
        $response = new CalendarResponse($calendar, 200);

        $this->assertInstanceOf('Symfony\Component\HttpFoundation\Response', $response);
        $this->assertInstanceOf('jorgelive\IcalBundle\Response\CalendarResponse', $response);
        $this->assertEquals(200, $response->getStatusCode());

        $this->assertEquals($calendar->export(), $response->getContent());

        $this->assertContains($calendar->getContentType()."; charset=utf-8", $response->headers->get('Content-Type'));
        $this->assertContains($calendar->getFilename(), $response->headers->get('Content-Disposition'));
    }
}
