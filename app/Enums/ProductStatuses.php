<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum ProductStatuses: string
{
    use EnumToArray;

    case UNPUBLISHED = 'unpublished';
    case PUBLISHED = 'published';
}
