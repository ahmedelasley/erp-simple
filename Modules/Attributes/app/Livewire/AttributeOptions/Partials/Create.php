<?php

namespace Modules\Attributes\Livewire\AttributeOptions\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Attributes\Livewire\AttributeOptions\GetData;
use Modules\Attributes\Interfaces\AttributeServiceInterface;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Attributes\Http\Requests\AttributeOptionStoreRequest;
use Modules\Attributes\Interfaces\AttributeOptionServiceInterface;

class Create extends BaseComponent
{

    // public string $tilte = 'Attributes';
    public string $tilteModal = 'Add New';
    public  $subTilteModal = 'Attribute Option';
    // public string $tilte_lower = 'Attributes';
    public string $modal_id = 'create';

    public string $modal_value = 'Save';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    public ?int $attribute_id = null;
    public string $name = '';
    public array $value = [];
    public ?int $sort_order = null;

    public function mount(): void
    {
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $this->value[$localeCode] = '';
        }
    }
    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new AttributeOptionStoreRequest())->rules();
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

        $service->create($validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('create-attribute-option-modal');

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
