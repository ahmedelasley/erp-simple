<?php

namespace Modules\Categories\Livewire\Categories\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Categories\Livewire\Categories\GetData;
use Modules\Categories\Interfaces\CategoryServiceInterface;
use Modules\Categories\Models\Category;

class Show extends BaseComponent
{

        // public string $tilte = 'Categorys';
    public string $tilteModal = 'Show';
    public  $subTilteModal = 'Category';
    // public string $tilte_lower = 'Categorys';
    public string $modal_id = 'show';

    public string $value = 'Show';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Category|null */
    public $model = null;

    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;
    public $children = null;

    protected $listeners = ['show_category'];

    public function show_category($id)
    {
        $this->model = Category::with(['parent', 'children'])->withCount('children')->findOrFail($id);

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
        $this->openModal('show-category-modal');
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

    public function render(CategoryServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('categories::livewire.categories.partials.form', [
            'data' => $data,
        ]);
    }
}
