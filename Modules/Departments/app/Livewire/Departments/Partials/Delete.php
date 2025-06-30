<?php

namespace Modules\Departments\Livewire\Departments\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Departments\Livewire\Departments\GetData;
use Modules\Departments\Interfaces\DepartmentServiceInterface;
use Modules\Departments\Models\Department;

class Delete extends BaseComponent
{
    /** @var Department|null */
    public $model = null;

    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;

    protected $listeners = ['delete_department'];

    public function delete_department($id)
    {
        $this->model = Department::findOrFail($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;

        }

        // Set the properties
        $this->name = $this->model->name;
        $this->description = $this->model->description;
        $this->parent_id = $this->model->parent_id;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('delete-department-modal');
    }


    public function submit(DepartmentServiceInterface $service): void
    {
        $service->delete($this->model);


        // $this->reset();

        // Close the modal on the frontend
        $this->closeModal('delete-department-modal');

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

        return view('departments::livewire.departments.partials.delete', [
            'data' => $data,
        ]);
    }
}
