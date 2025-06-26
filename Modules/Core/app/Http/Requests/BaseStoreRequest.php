<?php

namespace Modules\Core\Http\Requests;
use Modules\Core\Http\Requests\BaseRequest;

abstract class BaseStoreRequest extends BaseRequest
{

    /**
     * Common rules for storing data.
     *
     * @return array
     */
    abstract public function rules(): array;
}
