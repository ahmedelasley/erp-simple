<?php

namespace Modules\Attendances\Livewire\Attendances\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Attendances\Livewire\Attendances\GetData;
use Modules\Attendances\Http\Requests\AttendanceStoreRequest;

use Modules\Attendances\Interfaces\AttendanceServiceInterface;
use Modules\Employees\Interfaces\EmployeeServiceInterface;


class Create extends BaseComponent
{

    // public string $tilte = 'Attendances';
    public string $tilteModal = 'Add New';
    public  $subTilteModal = 'Attendance';
    // public string $tilte_lower = 'Attendances';
    public string $modal_id = 'create';

    public string $value = 'Save';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    public ?int $employee_id = null;
    public string $check_in = '';
    public string $check_out = '';
    public string $date = '';
    public string $status = '';

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new AttendanceStoreRequest())->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }


    public function submit(AttendanceServiceInterface $service): void
    {
        $validated = $this->validate();

        $service->create($validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('create-attendance-modal');

        // Refresh the Attendance table
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

    public function render(EmployeeServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('attendances::livewire.attendances.partials.form', [
            'data' => $data,
        ]);
    }
}
