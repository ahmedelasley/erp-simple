<?php

namespace Modules\Employees\Livewire\Employees\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Employees\Livewire\Employees\GetData;
use Modules\Employees\Interfaces\EmployeeServiceInterface;
use Modules\Employees\Models\Employee;

class Show extends BaseComponent
{

    // public string $tilte = 'Employees';
    public string $tilteModal = 'Show';
    public  $subTilteModal = 'Employee';
    // public string $tilte_lower = 'Employees';
    public string $modal_id = 'show';

    public string $value = 'Show';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Employee|null */
    public $model = null;

    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;
    public $children = null;

    protected $listeners = ['show_employee'];

    public function show_employee($id)
    {
        $this->model = Employee::findOrFail($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;

        }

        // Set the properties
        // $this->name = $this->model->name;
        // $this->description = $this->model->description;
        // $this->parent_id = $this->model->parent_id;
        $this->children = $this->model?->children;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('show-employee-modal');
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

    public function render(EmployeeServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('employees::livewire.employees.partials.form', [
            'data' => $data,
        ]);
    }
}
