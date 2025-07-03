<?php

namespace Modules\Employees\Livewire\Employees\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Employees\Livewire\Employees\GetData;
use Modules\Employees\Interfaces\EmployeeServiceInterface;
use Modules\Employees\Models\Employee;

class Delete extends BaseComponent
{




    /** @var Employee|null */
    public $model = null;

    // public string $tilte = 'Employees';
    public string $tilteModal = 'Delete';
    public  $subTilteModal = 'Employee';
    // public string $tilte_lower = 'Employees';
    public string $modal_id = 'delete';

    public string $value = 'Yes';
    public string $classBtn = 'danger';
    public string $clickBtn = 'submit';
    public string $target = 'submit';

    protected $listeners = ['delete_employee'];

    public function delete_employee($id, EmployeeServiceInterface $service)
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
        $this->openModal('delete-employee-modal');
    }


    public function submit(EmployeeServiceInterface $service): void
    {
        $service->delete($this->model);

        $this->close();

        // Close the modal on the frontend
        $this->closeModal('delete-employee-modal');

        // Refresh the Employee table
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

        // Refresh the Employee table
        $this->dispatch('refreshData');
        // Close the modal on the frontend
        // $this->closeModal('delete-employee-modal');
    }

    public function render(EmployeeServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('employees::livewire.employees.partials.form', [
            'data' => $data,
        ]);
    }
}
