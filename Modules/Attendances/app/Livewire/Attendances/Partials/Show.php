<?php

namespace Modules\Attendances\Livewire\Attendances\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Attendances\Livewire\Attendances\GetData;
use Modules\Attendances\Interfaces\AttendanceServiceInterface;
use Modules\Attendances\Models\Attendance;

class Show extends BaseComponent
{

    // public string $tilte = 'Attendances';
    public string $tilteModal = 'Show';
    public  $subTilteModal = 'Attendance';
    // public string $tilte_lower = 'Attendances';
    public string $modal_id = 'show';

    public string $value = 'Show';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Attendance|null */
    public $model = null;

    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;
    public $children = null;

    protected $listeners = ['show_attendance'];

    public function show_attendance($id)
    {
        $this->model = Attendance::findOrFail($id);

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
        $this->openModal('show-attendance-modal');
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

    public function render(AttendanceServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('attendances::livewire.attendances.partials.form', [
            'data' => $data,
        ]);
    }
}
