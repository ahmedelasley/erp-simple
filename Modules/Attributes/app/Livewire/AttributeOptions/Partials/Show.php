<?php

namespace Modules\Attributes\Livewire\AttributeOptions\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Attributes\Livewire\AttributeOptions\GetData;
use Modules\Attributes\Interfaces\AttributeOptionServiceInterface;
use Modules\Attributes\Models\AttributeOption;

class Show extends BaseComponent
{

        // public string $tilte = 'Attributes';
    public string $tilteModal = 'Show';
    public  $subTilteModal = 'Attribute Option';
    // public string $tilte_lower = 'Attributes';
    public string $modal_id = 'show';

    public string $modal_value = 'Show';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var AttributeOption|null */
    public $model = null;

    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;
    public $children = null;

    protected $listeners = ['show_attribute_option'];

    public function show_attribute_option($id)
    {
        $this->model = AttributeOption::with(['parent', 'children'])->withCount('children')->findOrFail($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;

        }

        // Set the properties
        // $this->name = $this->model->name;
        // $this->description = $this->model->description;
        // $this->parent_id = $this->model->parent_id;
        $this->children = $this->model?->children;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('show-attribute-option-modal');
    }


    /**
     * Reset form and validation states.
     */
    public function close(): void
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
        $this->dispatch('refreshData');
    }

    public function render(AttributeOptionServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('attributes::livewire.attribute-options.partials.form', [
            'data' => $data,
        ]);
    }
}
