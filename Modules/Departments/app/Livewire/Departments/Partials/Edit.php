<?php

namespace Modules\Departments\Livewire\Departments\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Departments\Livewire\Departments\GetData;
use Modules\Departments\Http\Requests\DepartmentUpdateRequest;
use Modules\Departments\Interfaces\DepartmentServiceInterface;
use Modules\Departments\Models\Department;

class Edit extends BaseComponent
{

        public string $tilteModal = 'Edit';
    public  $subTilteModal = 'Department';
    // public string $tilte_lower = 'departments';
    public string $modal_id = 'edit';

    public string $value = 'Update';
    public string $classBtn = 'success';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Department|null */
    public $model = null;

    public ?int $id = null;
    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;

    protected $listeners = ['edit_department'];

    public function edit_department($id)
    {
        $this->model = Department::findOrFail($id);

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
        $this->parent_id = $this->model->parent_id;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('edit-department-modal');
    }

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new DepartmentUpdateRequest($this->model?->id))->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }


        public function submit(DepartmentServiceInterface $service): void
    {
        $validated = $this->validate();
        if (isset($validated['parent_id']) && $validated['parent_id'] == '') {
            $validated['parent_id'] = null;
        }

        $service->update($this->model, $validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('edit-department-modal');

        // Refresh the department table
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

        $data = $service->All($filters)
            ->where('id', '!=', $this->id)
            ->get();

        return view('departments::livewire.departments.partials.form', [
            'data' => $data,
        ]);
    }
}
