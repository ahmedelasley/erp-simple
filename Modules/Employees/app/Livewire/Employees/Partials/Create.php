<?php

namespace Modules\Employees\Livewire\Employees\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Employees\Livewire\Employees\GetData;
use Modules\Employees\Http\Requests\EmployeeStoreRequest;
use Modules\Employees\Interfaces\EmployeeServiceInterface;

use Modules\Departments\Interfaces\DepartmentServiceInterface;

use Modules\Positions\Interfaces\PositionServiceInterface;

class Create extends BaseComponent
{

    // public string $tilte = 'Employees';
    public string $tilteModal = 'Add New';
    public  $subTilteModal = 'Employee';
    // public string $tilte_lower = 'Employees';
    public string $modal_id = 'create';

    public string $value = 'Save';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


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

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new EmployeeStoreRequest())->rules();
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

        $service->create($validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('create-employee-modal');

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
