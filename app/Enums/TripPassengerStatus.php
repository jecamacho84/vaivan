<?php

namespace App\Enums;

enum TripPassengerStatus: string
{
    case Scheduled = 'scheduled';
    case Boarded = 'boarded';
    case Unboarded = 'unboarded';
    case NoShow = 'no_show';
    case Cancelled = 'cancelled';
}
