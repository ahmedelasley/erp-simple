<?php

namespace Modules\Categories\Livewire\Categories\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Categories\Livewire\Categories\GetData;
use Modules\Categories\Http\Requests\CategoryStoreRequest;
use Modules\Categories\Interfaces\CategoryServiceInterface;

class Create extends BaseComponent
{

    // public string $tilte = 'Categorys';
    public string $tilteModal = 'Add New';
    public  $subTilteModal = 'Category';
    // public string $tilte_lower = 'Categorys';
    public string $modal_id = 'create';

    public string $value = 'Save';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new CategoryStoreRequest())->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }


    public function submit(CategoryServiceInterface $service): void
    {
        $validated = $this->validate();
        if (isset($validated['parent_id']) && $validated['parent_id'] == '') {
            $validated['parent_id'] = null;
        }

        $service->create($validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('create-category-modal');

        // Refresh the Category table
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

    public function render(CategoryServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('categories::livewire.categories.partials.form', [
            'data' => $data,
        ]);
    }
}
