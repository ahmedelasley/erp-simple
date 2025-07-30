<?php

namespace Modules\Attributes\Livewire\AttributeOptions\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Attributes\Livewire\AttributeOptions\GetData;
use Modules\Attributes\Interfaces\AttributeOptionServiceInterface;
use Modules\Attributes\Models\AttributeOption;

class Delete extends BaseComponent
{




    /** @var AttributeOption|null */
    public $model = null;

    // public string $tilte = 'Attributes';
    public string $tilteModal = 'Delete';
    public  $subTilteModal = 'Attribute Option';
    // public string $tilte_lower = 'Attributes';
    public string $modal_id = 'delete';

    public string $modal_value = 'Yes';
    public string $classBtn = 'danger';
    public string $clickBtn = 'submit';
    public string $target = 'submit';

    protected $listeners = ['delete_attribute_option'];

    public function delete_attribute_option($id, AttributeOptionServiceInterface $service)
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
        $this->openModal('delete-attribute-option-modal');
    }


    public function submit(AttributeOptionServiceInterface $service): void
    {
        $service->delete($this->model);

        $this->close();

        // Close the modal on the frontend
        $this->closeModal('delete-attribute-option-modal');

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

    public function render(AttributeOptionServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('attributes::livewire.attribute-options.partials.form', [
            'data' => $data,
        ]);
    }
}
