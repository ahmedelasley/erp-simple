<?php

namespace Modules\Attendances\Livewire\Attendances\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Attendances\Livewire\Attendances\GetData;
use Modules\Attendances\Interfaces\AttendanceServiceInterface;
use Modules\Attendances\Models\Attendance;

class Delete extends BaseComponent
{

    /** @var Attendance|null */
    public $model = null;

    // public string $tilte = 'Attendances';
    public string $tilteModal = 'Delete';
    public  $subTilteModal = 'Attendance';
    // public string $tilte_lower = 'Attendances';
    public string $modal_id = 'delete';

    public string $value = 'Yes';
    public string $classBtn = 'danger';
    public string $clickBtn = 'submit';
    public string $target = 'submit';

    protected $listeners = ['delete_attendance'];

    public function delete_attendance($id, AttendanceServiceInterface $service)
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
        $this->openModal('delete-attendance-modal');
    }


    public function submit(AttendanceServiceInterface $service): void
    {
        $service->delete($this->model);

        $this->close();

        // Close the modal on the frontend
        $this->closeModal('delete-attendance-modal');

        // Refresh the Attendance table
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

        // Refresh the Attendance table
        $this->dispatch('refreshData');
        // Close the modal on the frontend
        // $this->closeModal('delete-Attendance-modal');
    }

    public function render()
    {

        return view('attendances::livewire.attendances.partials.form');
    }
}
