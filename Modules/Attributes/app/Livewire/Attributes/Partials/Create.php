<?php

namespace Modules\Attributes\Livewire\Attributes\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Attributes\Livewire\Attributes\GetData;
use Modules\Attributes\Http\Requests\AttributeStoreRequest;
use Modules\Attributes\Interfaces\AttributeServiceInterface;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Create extends BaseComponent
{

    // public string $tilte = 'Attributes';
    public string $tilteModal = 'Add New';
    public  $subTilteModal = 'Attribute';
    // public string $tilte_lower = 'Attributes';
    public string $modal_id = 'create';

    public string $modal_value = 'Save';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    public string $name = '';
    public array $value = [];

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
        return (new AttributeStoreRequest())->rules();
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

        $service->create($validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('create-attribute-modal');

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

        return view('attributes::livewire.attributes.partials.form', [
            'data' => $data,
        ]);
    }
}
