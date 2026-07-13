<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Enums;

enum PostStatus: string
{
    case Draft = 'draft';
    case Published = 'published';
}
