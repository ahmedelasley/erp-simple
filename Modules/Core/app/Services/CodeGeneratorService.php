<?php

namespace Modules\Core\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CodeGeneratorService
{
    /**
     * توليد كود تلقائي لأي موديل بناءً على آخر قيمة.
     *
     * @param string $prefix
     * @param string $modelClass
     * @param int $padLength
     * @param string $column
     * @return string
     */
    public function generate(string $prefix, string $modelClass, int $padLength = 3, string $column = 'id'): string
    {
        // التأكد أن الكلاس هو موديل صالح
        if (!is_subclass_of($modelClass, Model::class)) {
            throw new \InvalidArgumentException("{$modelClass} is not a valid Eloquent Model.");
        }

        // جلب أكبر قيمة ID بما في ذلك المحذوفين
        $lastId = $modelClass::max($column);

        $nextNumber = $lastId ? $lastId + 1 : 1;

        return $prefix . str_pad($nextNumber, $padLength, '0', STR_PAD_LEFT);
    }
}
