<?php

namespace Modules\Positions\Livewire\Positions\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Positions\Livewire\Positions\GetData;
use Modules\Positions\Http\Requests\PositionStoreRequest;
use Modules\Positions\Interfaces\PositionServiceInterface;
use Modules\Departments\Interfaces\DepartmentServiceInterface;

class Create extends BaseComponent
{

    // public string $tilte = 'Positions';
    public string $tilteModal = 'Add New';
    public  $subTilteModal = 'Position';
    // public string $tilte_lower = 'positions';
    public string $modal_id = 'create';

    public string $value = 'Save';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    public string $name = '';
    public string $description = '';
    public string $level = '';
    public ?int $department_id = null;

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new PositionStoreRequest())->rules();
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

        $service->create($validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('create-position-modal');

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
