<?php

namespace Modules\Categories\Livewire\Categories\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Categories\Livewire\Categories\GetData;
use Modules\Categories\Interfaces\CategoryServiceInterface;
use Modules\Categories\Models\Category;

class Delete extends BaseComponent
{




    /** @var Category|null */
    public $model = null;

    // public string $tilte = 'Categorys';
    public string $tilteModal = 'Delete';
    public  $subTilteModal = 'Category';
    // public string $tilte_lower = 'Categorys';
    public string $modal_id = 'delete';

    public string $value = 'Yes';
    public string $classBtn = 'danger';
    public string $clickBtn = 'submit';
    public string $target = 'submit';

    protected $listeners = ['delete_category'];

    public function delete_category($id, CategoryServiceInterface $service)
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
        $this->openModal('delete-category-modal');
    }


    public function submit(CategoryServiceInterface $service): void
    {
        $service->delete($this->model);

        $this->close();

        // Close the modal on the frontend
        $this->closeModal('delete-category-modal');

        // Refresh the Category table
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

        // Refresh the Category table
        $this->dispatch('refreshData');
        // Close the modal on the frontend
        // $this->closeModal('delete-category-modal');
    }

    public function render(CategoryServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('categories::livewire.categories.partials.form', [
            'data' => $data,
        ]);
    }
}
