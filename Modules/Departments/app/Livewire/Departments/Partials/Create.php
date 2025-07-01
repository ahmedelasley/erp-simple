<?php

namespace Modules\Departments\Livewire\Departments\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Departments\Livewire\Departments\GetData;
use Modules\Departments\Http\Requests\DepartmentStoreRequest;
use Modules\Departments\Interfaces\DepartmentServiceInterface;

class Create extends BaseComponent
{

    // public string $tilte = 'Departments';
    public string $tilteModal = 'Add New';
    public  $subTilteModal = 'Department';
    // public string $tilte_lower = 'departments';
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
        $this->closeModal('create-department-modal');

        // Refresh the department table
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

    public function render(DepartmentServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('departments::livewire.departments.partials.form', [
            'data' => $data,
        ]);
    }
}
