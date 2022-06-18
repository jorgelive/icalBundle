<?php

namespace jorgelive\IcalBundle\Tests\Mailer;

use jorgelive\IcalBundle\Component\Calendar;
use jorgelive\IcalBundle\Mailer\CalendarAttachment;
use jorgelive\IcalBundle\Tests\CalendarTestCase;

/**
 * Tests for the calendar response
 *
 * @package jorgelive\IcalBundle\Tests\Mailer
 * @author  jorge GOMEZ <gomez.valencia@outlook.com>
 */
class CalendarAttachmentTest extends CalendarTestCase
{
    /**
     * Testing calendar attachment
     *
     */
    public function testCalendarAttachment()
    {
        $calendar = new Calendar();
        $attachment = new CalendarAttachment($calendar);

        $this->assertInstanceOf('Swift_Attachment', $attachment);
        $this->assertInstanceOf('jorgelive\IcalBundle\Mailer\CalendarAttachment', $attachment);

        $this->assertEquals($calendar->export(), $attachment->getBody());
        $this->assertEquals($calendar->getFilename(), $attachment->getFilename());
        $this->assertEquals($calendar->getContentType()."; charset=utf-8", $attachment->getContentType());
    }
}
