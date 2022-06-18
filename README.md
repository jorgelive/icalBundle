# icalBundle

[![Build Status](https://travis-ci.org/jorgelivedev/icalBundle.svg?branch=master)](https://travis-ci.org/jorgelivedev/icalBundle)
[![Packagist](https://img.shields.io/packagist/v/jorgelive/ical-bundle.svg)](https://packagist.org/packages/jorgelive/ical-bundle)
[![Packagist](https://img.shields.io/packagist/dt/jorgelive/ical-bundle.svg)](https://packagist.org/packages/jorgelive/ical-bundle)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/jorgelivedev/icalBundle/blob/master/LICENSE)

Symfony Bundle to manage .ics iCal file (creating and eventually reading)

use of the library: <https://github.com/jasvrcek/ICS>

## Setup

Add bundle to your project:

```bash
composer require jorgelive/ical-bundle
```

Add `jorgelive\IcalBundle\jorgeliveIcalBundle` to your `AppKernel.php`:

```php
$bundles = [
    // ...
    new jorgelive\IcalBundle\jorgeliveIcalBundle(),
];
```

## Configuration

In your `config.yml`:

```yaml
jorgelive_ical:
    default_timezone: "Europe/Paris"
    default_prodid: "-//jorgeliveIcalBundle//Calendar App//FR"
```

## Usage

``` php
<?php

    ...

    /**
     * Generate calendar event ICAL for jorgeliveAction
     * @Config\Route("/ical", name="app_ical")
     */
    public function icalAction()
    {
        $icalFactory = $this->get('jorgelive_ical.factory');

        //Create a calendar
        $calendar = $icalFactory->createCalendar();

        //Create an event
        $eventOne = $icalFactory->createCalendarEvent();
        $eventOne->setStart(new \DateTime())
            ->setSummary('Family reunion')
            ->setUid('event-uid');

        //add an Attendee
        $attendee = $icalFactory->createAttendee();
        $attendee->setValue('moe@example.com')
            ->setName('Moe Smith');
        $eventOne->addAttendee($attendee);

        //set the Organizer
        $organizer = $icalFactory->createOrganizer();
        $organizer->setValue('titouan@jorgelive.fr')
            ->setName('jorge GOMEZ')
            ->setLanguage('fr');
        $eventOne->setOrganizer($organizer);

        //new event
        $eventTwo = $icalFactory->createCalendarEvent();
        $eventTwo->setStart(new \DateTime())
            ->setSummary('Dentist Appointment')
            ->setUid('event-uid');

        $calendar
            ->addEvent($eventOne)
            ->addEvent($eventTwo);

        $headers = array();
        $calendarResponse = new jorgelive\IcalBundle\Response\CalendarResponse($calendar, 200, $headers);

        return $calendarResponse;

    }


```
