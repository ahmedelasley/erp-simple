<?php

namespace Modules\ChartOfAccounts\Livewire\Accounts\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\ChartOfAccounts\Livewire\Accounts\GetData;
use Modules\ChartOfAccounts\Http\Requests\AccountUpdateRequest;
use Modules\ChartOfAccounts\Models\Account;
use Modules\ChartOfAccounts\Interfaces\AccountServiceInterface;

class Edit extends BaseComponent
{

    public string $tilteModal = 'Edit';
    public  $subTilteModal = 'Account';
    // public string $tilte_lower = 'Accounts';
    public string $modal_id = 'edit';

    public string $value = 'Update';
    public string $classBtn = 'success';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Account|null */
    public $model = null;

    public ?int $id = null;

    public string $name = '';
    public ?int $parent_id = null;
    public string $type = '';
    public string $level = '';
    public string $category = '';
    public string $status = '';
    public ?string $description = null;

    protected $listeners = ['edit_account'];

    public function edit_account($id)
    {
        $this->model = Account::findOrFail($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;

        }

        // Set the properties
        $this->id = $this->model->id;
        $this->name = $this->model->name;
        $this->parent_id = $this->model->parent_id;
        $this->type = $this->model->type->value;
        $this->level = $this->model->level->value;
        $this->category = $this->model->category->value;
        $this->status = $this->model->status->value;
        $this->description = $this->model->description;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('edit-account-modal');
    }

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new AccountUpdateRequest($this->model?->id))->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }


        public function submit(AccountServiceInterface $service): void
    {
        $validated = $this->validate();

        $service->update($this->model, $validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('edit-account-modal');

        // Refresh the Account table
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

    public function render(AccountServiceInterface $service)
    {

        $filters = [];
        // $data = $service->All($filters)->with(['children'])->whereNull('parent_id')->get();
        $data = $service->All($filters)->with(['children', 'journalEntryItems'])->whereNull('parent_id')
        ->withCount(['children', 'journalEntryItems'])->get();
        return view('chartofaccounts::livewire.accounts.partials.form', [
            'data' => $data,
        ]);
    }
}
