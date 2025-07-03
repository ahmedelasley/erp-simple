<?php

namespace Modules\Employees\Livewire\Employees\Partials;

use Modules\Employees\Models\Employee;
use Modules\Core\Livewire\BaseComponent;
use Modules\Employees\Livewire\Employees\GetData;
use Modules\Employees\Http\Requests\EmployeeUpdateRequest;
use Modules\Employees\Interfaces\EmployeeServiceInterface;
use Modules\Departments\Interfaces\DepartmentServiceInterface;

use Modules\Positions\Interfaces\PositionServiceInterface;
class Edit extends BaseComponent
{

        public string $tilteModal = 'Edit';
    public  $subTilteModal = 'Employee';
    // public string $tilte_lower = 'Employees';
    public string $modal_id = 'edit';

    public string $value = 'Update';
    public string $classBtn = 'success';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Employee|null */
    public $model = null;

    public ?int $id = null;

    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $gender = '';
    public string $national_id = '';
    public ?int $position_id = null;
    public ?int $department_id = null;
    public string $hire_date = '';
    public string $photo = '';
    public string $status = '';

    protected $listeners = ['edit_employee'];

    public function edit_employee($id)
    {
        $this->model = Employee::findOrFail($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;

        }

        // Set the properties
        $this->id = $this->model->id;
        $this->name = $this->model->name;
        $this->email = $this->model->email;
        $this->phone = $this->model->phone;
        $this->gender = $this->model->gender;
        $this->national_id = $this->model->national_id;
        $this->position_id = $this->model->position_id;
        $this->department_id = $this->model->department_id;
        $this->hire_date = $this->model->hire_date;
        $this->photo = $this->model->photo;
        $this->status = $this->model->status->value;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('edit-employee-modal');
    }

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new EmployeeUpdateRequest($this->model?->id))->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }


        public function submit(EmployeeServiceInterface $service): void
    {
        $validated = $this->validate();

        $service->update($this->model, $validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('edit-employee-modal');

        // Refresh the Employee table
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

    public function render(DepartmentServiceInterface $departmentsService, PositionServiceInterface $positionsService)
    {

        $filters = [];

        $dataDepartments = $departmentsService->All($filters)->get();
        $dataPositions = $positionsService->All($filters)->get();

        return view('employees::livewire.employees.partials.form', [
            'dataDepartments' => $dataDepartments,
            'dataPositions' => $dataPositions,
        ]);
    }
}
