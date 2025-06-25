<?php

namespace Modules\Core\Enums;

enum StatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case ARCHIVED = 'archived';

    /**
     * Label for display.
     */
    public function label(): string
    {
        return match ($this) {
            self::ACTIVE   => __('Active'),
            self::INACTIVE => __('Inactive'),
            self::ARCHIVED => __('Archived'),
        };
    }

    /**
     * Bootstrap badge color.
     */
    public function badgeColor(): string
    {
        return match ($this) {
            self::ACTIVE   => 'success',
            self::INACTIVE => 'secondary',
            self::ARCHIVED => 'dark',
        };
    }

    /**
     * Icon class (optional for UI).
     */
    public function icon(): string
    {
        return match ($this) {
            self::ACTIVE   => 'bx bx-check-circle',
            self::INACTIVE => 'bx bx-pause-circle',
            self::ARCHIVED => 'bx bx-archive',
        };
    }

    /**
     * Array for dropdowns.
     */
    public static function options(): array
    {
        return [
            self::ACTIVE->value   => self::ACTIVE->label(),
            self::INACTIVE->value => self::INACTIVE->label(),
            self::ARCHIVED->value => self::ARCHIVED->label(),
        ];
    }
}
