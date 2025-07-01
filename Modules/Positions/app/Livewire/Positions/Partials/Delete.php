<?php

namespace Modules\Positions\Livewire\Positions\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Positions\Livewire\Positions\GetData;
use Modules\Positions\Interfaces\PositionServiceInterface;
use Modules\Positions\Models\Position;

class Delete extends BaseComponent
{




    /** @var Position|null */
    public $model = null;

    // public string $tilte = 'Positions';
    public string $tilteModal = 'Delete';
    public  $subTilteModal = 'Position';
    // public string $tilte_lower = 'positions';
    public string $modal_id = 'delete';

    public string $value = 'Yes';
    public string $classBtn = 'danger';
    public string $clickBtn = 'submit';
    public string $target = 'submit';

    protected $listeners = ['delete_position'];

    public function delete_position($id, PositionServiceInterface $service)
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
        $this->openModal('delete-position-modal');
    }


    public function submit(PositionServiceInterface $service): void
    {
        $service->delete($this->model);

        $this->close();

        // Close the modal on the frontend
        $this->closeModal('delete-position-modal');

        // Refresh the Position table
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

        // Refresh the Position table
        $this->dispatch('refreshData');
        // Close the modal on the frontend
        // $this->closeModal('delete-Position-modal');
    }

    public function render(PositionServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('positions::livewire.positions.partials.form', [
            'data' => $data,
        ]);
    }
}
