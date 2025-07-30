<?php

namespace Modules\Attributes\Livewire\Attributes\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Attributes\Livewire\Attributes\GetData;
use Modules\Attributes\Http\Requests\AttributeUpdateRequest;
use Modules\Attributes\Interfaces\AttributeServiceInterface;
use Modules\Attributes\Models\Attribute;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Edit extends BaseComponent
{

    public string $tilteModal = 'Edit';
    public  $subTilteModal = 'Attribute';
    // public string $tilte_lower = 'Attributes';
    public string $modal_id = 'edit';

    public string $modal_value = 'Update';
    public string $classBtn = 'success';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Attribute|null */
    public $model = null;

    public ?int $id = null;
    public string $name = '';
    public array $value = [];

    // public function mount(): void
    // {
    //     foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
    //         $this->value[$localeCode] = '';
    //     }
    // }

    protected $listeners = ['edit_attribute'];

    public function edit_attribute($id)
    {
        $this->model = Attribute::findOrFail($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;

        }

        // Set the properties
        $this->id = $this->model->id;
        $this->name = $this->model->name;
        $this->value = $this->model->value;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('edit-attribute-modal');
    }

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new AttributeUpdateRequest($this->model?->id))->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }


        public function submit(AttributeServiceInterface $service): void
    {
        $validated = $this->validate();
        // if (isset($validated['parent_id']) && $validated['parent_id'] == '') {
        //     $validated['parent_id'] = null;
        // }

        $service->update($this->model, $validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('edit-attribute-modal');

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

        $data = $service->All($filters)
            ->where('id', '!=', $this->id)
            ->get();

        return view('attributes::livewire.attributes.partials.form', [
            'data' => $data,
        ]);
    }
}
