<?php

namespace Modules\Attendances\Livewire\Attendances\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Attendances\Models\Attendance;
use Modules\Attendances\Livewire\Attendances\GetData;
use Modules\Attendances\Http\Requests\AttendanceUpdateRequest;

use Modules\Attendances\Interfaces\AttendanceServiceInterface;
use Modules\Employees\Interfaces\EmployeeServiceInterface;

class Edit extends BaseComponent
{

    public string $tilteModal = 'Edit';
    public  $subTilteModal = 'Attendance';
    // public string $tilte_lower = 'Attendances';
    public string $modal_id = 'edit';

    public string $value = 'Update';
    public string $classBtn = 'success';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Attendance|null */
    public $model = null;

    public ?int $id = null;

    public ?int $employee_id = null;
    public string $check_in = '';
    public string $check_out = '';
    public string $date = '';
    public string $status = '';

    protected $listeners = ['edit_attendance'];

    public function edit_attendance($id)
    {
        $this->model = Attendance::findOrFail($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;

        }

        // Set the properties
        $this->id = $this->model->id;
        $this->employee_id = $this->model->employee_id;
        $this->check_in = $this->model->check_in;
        $this->check_out = $this->model->check_out;
        $this->date = $this->model->date;
        $this->status = $this->model->status->value;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('edit-attendance-modal');
    }

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new AttendanceUpdateRequest($this->model?->id))->rules();
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

        $service->update($this->model, $validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('edit-attendance-modal');

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
