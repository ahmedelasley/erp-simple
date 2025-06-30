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
    protected mixed $id;

    /**
     * BaseUpdateRequest constructor.
     *
     * @param mixed $modelId
     */
    public function __construct($id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * Common rules for updating data.
     * 
     * @return array
     */

    abstract public function rules(): array;
}