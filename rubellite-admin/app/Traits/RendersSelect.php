<?php

namespace App\Traits;

trait RendersSelect
{
    public static function renderSelect()
    {
        $value_column = self::SELECT_COLUMN;
        return self::select('id', "{$value_column} as value")->get();
    }
}
