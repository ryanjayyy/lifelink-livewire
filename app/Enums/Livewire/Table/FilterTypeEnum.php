<?php

namespace App\Enums\Livewire\Table;

enum FilterTypeEnum: string
{
    // A select input that uses a LIKE query
    case SELECT_LIKE = 'select_like';

    // A select input that uses an = query
    case SELECT = 'select';

    // A date input that uses a date range query
    case DATE = 'date';

    // A slider input that uses a range query
    case RANGE = 'range';

    // A text input that uses a LIKE query
    case STRING = 'string';

    // No filter for the column
    case NONE = 'none';
}
