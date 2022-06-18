<?php

namespace jorgelive\IcalBundle\Component;

use Jsvrcek\ICS\Model\Calendar as vCalendar;

use Jsvrcek\ICS\Utility\Formatter;
use Jsvrcek\ICS\CalendarStream;
use Jsvrcek\ICS\CalendarExport;

/**
 * Calendar component
 *
 * @package jorgelive\IcalBundle\Component
 * @author  jorge GOMEZ <gomez.valencia@outlook.com>
 */
class Calendar extends vCalendar
{
    /**
     * String $filename
     */
    private $filename = 'calendar.ics';

    /**
     * Calendar contentType
     * @return String calendar contentType
     */
    public function getContentType(){
        return 'text/calendar';
    }

    /**
     * Export
     * @param Boolean $doImmediateOutput = false
     * @return String .ics formatted text
     */
    public function export($doImmediateOutput = false){
        //setup exporter
        $calendarExport = new CalendarExport(new CalendarStream, new Formatter());
        $calendarExport->addCalendar($this);

        //set exporter to send items directly to output instead of storing in memory
        $calendarExport->getStreamObject()->setDoImmediateOutput($doImmediateOutput);

        //output .ics formatted text
        return $calendarExport->getStream();
    }

    /**
     * Set filename
     *
     * @param String $filename
     * @return Calendar
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return String
     */
    public function getFilename()
    {
        return $this->filename;
    }

}
