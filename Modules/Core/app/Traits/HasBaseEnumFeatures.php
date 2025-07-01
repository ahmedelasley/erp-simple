<?php

namespace Modules\Core\Traits;

trait HasBaseEnumFeatures
{
    public function label(): string
    {
        return __(str_replace('_', ' ', ucfirst($this->value)));
    }

    public static function labels(): array
    {
        return array_column(static::cases(), 'value');
    }

    public static function options(): array
    {
        return collect(static::cases())->mapWithKeys(fn($case) => [
            $case->value => $case->label(),
        ])->toArray();
    }
}
