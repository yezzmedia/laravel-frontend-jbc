<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Enums;

enum BookStatus: string
{
    case Read = 'read';
    case Unread = 'unread';
    case Reading = 'reading';
}
