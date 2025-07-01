<?php

namespace Modules\Positions\Livewire\Positions\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Positions\Livewire\Positions\GetData;
use Modules\Positions\Interfaces\PositionServiceInterface;
use Modules\Positions\Models\Position;

class Show extends BaseComponent
{

    // public string $tilte = 'Positions';
    public string $tilteModal = 'Show';
    public  $subTilteModal = 'Position';
    // public string $tilte_lower = 'positions';
    public string $modal_id = 'show';

    public string $value = 'Show';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Position|null */
    public $model = null;

    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;
    public $children = null;

    protected $listeners = ['show_position'];

    public function show_position($id)
    {
        $this->model = Position::findOrFail($id);

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
        $this->openModal('show-position-modal');
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

    public function render(PositionServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('positions::livewire.positions.partials.form', [
            'data' => $data,
        ]);
    }
}
