<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait ReadableTimestamp
{
    protected function generateDate($value = null, $format = 'M d, Y (H:i:s)')
    {
        return !is_null($value) ? Carbon::parse($value)->format($format) : null;
    }

    public function createdAt(): Attribute
    {
        if (Schema::hasColumn(self::getTable(), 'created_at')) {
            return Attribute::get(fn($value) => $this->generateDate($value));
        } else {
            return Attribute::get(fn() => null);
        }
    }

    public function updatedAt(): Attribute
    {
        if (Schema::hasColumn(self::getTable(), 'updated_at')) {
            return Attribute::get(fn($value) => $this->generateDate($value));
        } else {
            return Attribute::get(fn() => null);
        }
    }

    public function deletedAt(): Attribute
    {
        if (Schema::hasColumn(self::getTable(), 'deleted_at')) {
            return Attribute::get(fn($value) => $this->generateDate($value));
        } else {
            return Attribute::get(fn() => null);
        }
    }
}
