<?php

namespace jorgelive\IcalBundle\Mailer;

use jorgelive\IcalBundle\Component\Calendar;

use Jsvrcek\ICS\Utility\Formatter;
use Jsvrcek\ICS\CalendarStream;
use Jsvrcek\ICS\CalendarExport;

/**
 * Calendar attachment for Swift mailer messages
 *
 * @package jorgelive\IcalBundle\Mailer
 * @author  jorge GOMEZ <gomez.valencia@outlook.com>
 */
class CalendarAttachment extends \Swift_Attachment
{
    /**
     * Calendar attachment constructor
     *
     * @param Calendar $calendar
     */
    public function __construct(Calendar $calendar)
    {
        $data = $calendar->export();

        $filename = $calendar->getFilename();
        $contentType = sprintf('%s; charset=utf-8', $calendar->getContentType());

        parent::__construct($data, $filename, $contentType);
    }
}
