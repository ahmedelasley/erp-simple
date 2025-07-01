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

    // public string $tilte = 'Departments';
    public string $tilteModal = 'Delete';
    public  $subTilteModal = 'Department';
    // public string $tilte_lower = 'departments';
    public string $modal_id = 'delete';

    public string $value = 'Yes';
    public string $classBtn = 'danger';
    public string $clickBtn = 'submit';
    public string $target = 'submit';

    protected $listeners = ['delete_department'];

    public function delete_department($id, DepartmentServiceInterface $service)
    {
        $this->model = $service->find($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;
        }


        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('delete-department-modal');
    }


    public function submit(DepartmentServiceInterface $service): void
    {
        $service->delete($this->model);

        $this->close();

        // Close the modal on the frontend
        $this->closeModal('delete-department-modal');

        // Refresh the department table
        // $this->dispatch('refreshData')->to(GetData::class);

        // Show success alert
        $this->successAlert();

    }


    /**
     * Reset form and validation states.
     */
    public function close(): void
    {
        // Reset Data, Validation, ErrorBag
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();

        // Refresh the department table
        $this->dispatch('refreshData');
        // Close the modal on the frontend
        // $this->closeModal('delete-department-modal');
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
