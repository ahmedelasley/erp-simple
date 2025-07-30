<?php

namespace Modules\Attributes\Livewire\AttributeOptions\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Attributes\Models\AttributeOption;
use Modules\Attributes\Livewire\AttributeOptions\GetData;
use Modules\Attributes\Interfaces\AttributeServiceInterface;
use Modules\Attributes\Http\Requests\AttributeOptionUpdateRequest;
use Modules\Attributes\Interfaces\AttributeOptionServiceInterface;

class Edit extends BaseComponent
{

    public string $tilteModal = 'Edit';
    public  $subTilteModal = 'Attribute Option';
    // public string $tilte_lower = 'Attributes';
    public string $modal_id = 'edit';

    public string $modal_value = 'Update';
    public string $classBtn = 'success';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var AttributeOption|null */
    public $model = null;

    public ?int $id = null;
     public ?int $attribute_id = null;
    public string $name = '';
    public array $value = [];
    public ?int $sort_order = null;

    protected $listeners = ['edit_attribute_option'];

    public function edit_attribute_option($id)
    {
        $this->model = AttributeOption::findOrFail($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;

        }

        // Set the properties
        $this->id = $this->model->id;
        $this->attribute_id = $this->model->attribute_id;
        $this->name = $this->model->name;
        $this->value = $this->model->value;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('edit-attribute-option-modal');
    }

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new AttributeOptionUpdateRequest($this->model?->id))->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }


    public function submit(AttributeOptionServiceInterface $service): void
    {
        $validated = $this->validate();


        $service->update($this->model, $validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('edit-attribute-option-modal');

        // Refresh the Attribute table
        $this->dispatch('refreshData')->to(GetData::class);

        // Show success alert
        $this->successAlert();

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

        return view('attributes::livewire.attribute-options.partials.form', [
            'data' => $data,
        ]);
    }
}
