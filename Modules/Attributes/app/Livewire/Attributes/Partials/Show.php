<?php

namespace Modules\Attributes\Livewire\Attributes\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Attributes\Livewire\Attributes\GetData;
use Modules\Attributes\Interfaces\AttributeServiceInterface;
use Modules\Attributes\Models\Attribute;

class Show extends BaseComponent
{

        // public string $tilte = 'Attributes';
    public string $tilteModal = 'Show';
    public  $subTilteModal = 'Attribute';
    // public string $tilte_lower = 'Attributes';
    public string $modal_id = 'show';

    public string $modal_value = 'Show';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Attribute|null */
    public $model = null;

    public string $name = '';
    public array $value = [];
    public $options = null;

    protected $listeners = ['show_attribute'];

    public function show_attribute($id)
    {
        $this->model = Attribute::findOrFail($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;

        }

        // Set the properties
        $this->name = $this->model->name;
        $this->value = $this->model->value;
        $this->options = $this->model?->options;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('show-attribute-modal');
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

    public function render(AttributeServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('attributes::livewire.attributes.partials.form', [
            'data' => $data,
        ]);
    }
}
