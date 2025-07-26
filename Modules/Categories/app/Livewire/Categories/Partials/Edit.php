<?php

namespace Modules\Categories\Livewire\Categories\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\Categories\Livewire\Categories\GetData;
use Modules\Categories\Http\Requests\CategoryUpdateRequest;
use Modules\Categories\Interfaces\CategoryServiceInterface;
use Modules\Categories\Models\Category;

class Edit extends BaseComponent
{

        public string $tilteModal = 'Edit';
    public  $subTilteModal = 'Category';
    // public string $tilte_lower = 'Categorys';
    public string $modal_id = 'edit';

    public string $value = 'Update';
    public string $classBtn = 'success';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Category|null */
    public $model = null;

    public ?int $id = null;
    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;

    protected $listeners = ['edit_category'];

    public function edit_category($id)
    {
        $this->model = Category::findOrFail($id);

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
        $this->openModal('edit-category-modal');
    }

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new CategoryUpdateRequest($this->model?->id))->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }


        public function submit(CategoryServiceInterface $service): void
    {
        $validated = $this->validate();
        if (isset($validated['parent_id']) && $validated['parent_id'] == '') {
            $validated['parent_id'] = null;
        }

        $service->update($this->model, $validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('edit-category-modal');

        // Refresh the Category table
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

    public function render(CategoryServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)
            ->where('id', '!=', $this->id)
            ->get();

        return view('categories::livewire.categories.partials.form', [
            'data' => $data,
        ]);
    }
}
