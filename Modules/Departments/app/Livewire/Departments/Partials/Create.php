<?php

namespace Modules\Departments\Livewire\Departments\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Departments\Livewire\Departments\GetData;
use Modules\Core\Http\Requests\DepartmentStoreRequest;
use Modules\Departments\Interfaces\DepartmentServiceInterface;

class Create extends BaseComponent
{
    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new DepartmentStoreRequest())->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }


        public function submit(DepartmentServiceInterface $service): void
    {
        $validated = $this->validate();
        if (isset($validated['parent_id']) && $validated['parent_id'] == '') {
            $validated['parent_id'] = null;
        }

        $service->create($validated);


        $this->reset();

        // Close the modal on the frontend
        $this->dispatch('create-category-modal');

        // Refresh the category table
        $this->dispatch('refreshData')->to(GetData::class);

        // Show success alert
        $this->successAlert();
        // LivewireAlert::title(__('Success'))
        //     ->text(__('Category added successfully.'))
        //     ->success()
        //     ->show();
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

    public function render(DepartmentServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters);

        return view('departments::livewire.departments.partials.create', [
            'data' => $data,
        ]);
    }
}
