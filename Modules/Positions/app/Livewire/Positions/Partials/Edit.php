<?php

namespace Modules\Positions\Livewire\Positions\Partials;

use Modules\Positions\Models\Position;
use Modules\Core\Livewire\BaseComponent;
use Modules\Positions\Livewire\Positions\GetData;
use Modules\Positions\Http\Requests\PositionUpdateRequest;
use Modules\Positions\Interfaces\PositionServiceInterface;
use Modules\Departments\Interfaces\DepartmentServiceInterface;

class Edit extends BaseComponent
{

        public string $tilteModal = 'Edit';
    public  $subTilteModal = 'Position';
    // public string $tilte_lower = 'positions';
    public string $modal_id = 'edit';

    public string $value = 'Update';
    public string $classBtn = 'success';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Position|null */
    public $model = null;

    public ?int $id = null;
    public string $name = '';
    public string $description = '';
    public string $level = '';
    public ?int $department_id = null;

    protected $listeners = ['edit_position'];

    public function edit_position($id)
    {
        $this->model = Position::findOrFail($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;

        }

        // Set the properties
        $this->id = $this->model->id;
        $this->name = $this->model->name;
        $this->description = $this->model->description;
        $this->level = $this->model->level;
        $this->department_id = $this->model->department_id;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('edit-position-modal');
    }

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new PositionUpdateRequest($this->model?->id))->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }


        public function submit(PositionServiceInterface $service): void
    {
        $validated = $this->validate();

        $service->update($this->model, $validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('edit-position-modal');

        // Refresh the Position table
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

        return view('positions::livewire.positions.partials.form', [
            'data' => $data,
        ]);
    }
}
