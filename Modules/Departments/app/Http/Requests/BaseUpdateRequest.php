<?php

namespace Modules\Core\Http\Requests;
use Modules\Core\Http\Requests\BaseRequest;

abstract class BaseUpdateRequest extends BaseRequest
{
    /**
     * The ID of the model being updated.
     *
     * @var mixed
     */
    protected mixed $modelId;

    /**
     * BaseUpdateRequest constructor.
     *
     * @param mixed $modelId
     */
    public function __construct($modelId = null)
    {
        parent::__construct();
        $this->modelId = $modelId;
    }

    /**
     * Common rules for updating data.
     * 
     * @return array
     */

    abstract public function rules(): array;
}