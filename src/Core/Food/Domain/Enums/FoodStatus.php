<?php

namespace Dmontielfdez\Core\Food\Domain\Enums;

enum FoodStatus: string
{
    case draft = 'draft';
    case published = 'published';
}
