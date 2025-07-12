<?php

namespace Modules\ChartOfAccounts\Livewire\Accounts\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\ChartOfAccounts\Livewire\Accounts\GetData;
use Modules\ChartOfAccounts\Interfaces\AccountServiceInterface;
use Modules\ChartOfAccounts\Models\Account;

class Delete extends BaseComponent
{




    /** @var Account|null */
    public $model = null;

    // public string $tilte = 'Accounts';
    public string $tilteModal = 'Delete';
    public  $subTilteModal = 'Account';
    // public string $tilte_lower = 'Accounts';
    public string $modal_id = 'delete';

    public string $value = 'Yes';
    public string $classBtn = 'danger';
    public string $clickBtn = 'submit';
    public string $target = 'submit';

    protected $listeners = ['delete_account'];

    public function delete_account($id, AccountServiceInterface $service)
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
        $this->openModal('delete-account-modal');
    }


    public function submit(AccountServiceInterface $service): void
    {
        $service->delete($this->model);

        $this->close();

        // Close the modal on the frontend
        $this->closeModal('delete-account-modal');

        // Refresh the Account table
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

        // Refresh the Account table
        $this->dispatch('refreshData');
        // Close the modal on the frontend
        // $this->closeModal('delete-Account-modal');
    }

    public function render(AccountServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('chartofaccounts::livewire.accounts.partials.form', [
            'data' => $data,
        ]);
    }
}
