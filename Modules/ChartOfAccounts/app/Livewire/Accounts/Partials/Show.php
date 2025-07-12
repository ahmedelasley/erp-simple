<?php

namespace Modules\ChartOfAccounts\Livewire\Accounts\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\ChartOfAccounts\Livewire\Accounts\GetData;
use Modules\ChartOfAccounts\Interfaces\AccountServiceInterface;
use Modules\ChartOfAccounts\Models\Account;

class Show extends BaseComponent
{

    // public string $tilte = 'Accounts';
    public string $tilteModal = 'Show';
    public  $subTilteModal = 'Account';
    // public string $tilte_lower = 'Accounts';
    public string $modal_id = 'show';

    public string $value = 'Show';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    /** @var Account|null */
    public $model = null;

    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;
    public $children = null;

    protected $listeners = ['show_account'];

    public function show_account($id)
    {
        $this->model = Account::findOrFail($id);

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
        $this->openModal('show-account-modal');
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

        $data = $service->All($filters)
        ->with(['children', 'journalEntryItems'])->whereNull('parent_id')
        // ->withCount('children')
        ->get();

        return view('chartofaccounts::livewire.accounts.partials.form', [
            'data' => $data,
        ]);
    }
}
