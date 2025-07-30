<?php

namespace Modules\Attributes\Livewire\Attributes\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Attributes\Livewire\Attributes\GetData;
use Modules\Attributes\Interfaces\AttributeServiceInterface;
use Modules\Attributes\Models\Attribute;

class Delete extends BaseComponent
{




    /** @var Attribute|null */
    public $model = null;

    // public string $tilte = 'Attributes';
    public string $tilteModal = 'Delete';
    public  $subTilteModal = 'Attribute';
    // public string $tilte_lower = 'Attributes';
    public string $modal_id = 'delete';

    public string $modal_value = 'Yes';
    public string $classBtn = 'danger';
    public string $clickBtn = 'submit';
    public string $target = 'submit';

    protected $listeners = ['delete_attribute'];

    public function delete_attribute($id, AttributeServiceInterface $service)
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
        $this->openModal('delete-attribute-modal');
    }


    public function submit(AttributeServiceInterface $service): void
    {
        $service->delete($this->model);

        $this->close();

        // Close the modal on the frontend
        $this->closeModal('delete-attribute-modal');

        // Refresh the Attribute table
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

        // Refresh the Attribute table
        $this->dispatch('refreshData');
        // Close the modal on the frontend
        // $this->closeModal('delete-attribute-modal');
    }

    public function render(AttributeServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('attributes::livewire.attributes.partials.form', [
            'data' => $data,
        ]);
    }
}
