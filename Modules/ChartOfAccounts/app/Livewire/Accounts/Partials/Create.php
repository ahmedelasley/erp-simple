<?php

namespace Modules\ChartOfAccounts\Livewire\Accounts\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\ChartOfAccounts\Livewire\Accounts\GetData;
use Modules\ChartOfAccounts\Http\Requests\AccountStoreRequest;
use Modules\ChartOfAccounts\Interfaces\AccountServiceInterface;

use Modules\Departments\Interfaces\DepartmentServiceInterface;

use Modules\Positions\Interfaces\PositionServiceInterface;

class Create extends BaseComponent
{

    // public string $tilte = 'Accounts';
    public string $tilteModal = 'Add New';
    public  $subTilteModal = 'Account';
    // public string $tilte_lower = 'Accounts';
    public string $modal_id = 'create';

    public string $value = 'Save';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    public string $name = '';
    // public string $account_type = '';
    // public ?int $type_id = null;
    public ?int $parent_id = null;
    public string $type = '';
    public string $level = '';
    public string $category = '';
    public string $status = '';
    public string $description = '';


    // public string $phone = '';
    // public string $gender = '';
    // public string $national_id = '';
    // public ?int $position_id = null;
    // public ?int $department_id = null;
    // public string $hire_date = '';
    // public string $photo = '';
    // public string $status = '';

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new AccountStoreRequest())->rules();
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

        $service->create($validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('create-account-modal');

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
        $data = $service->All($filters)->with(['children'])->whereNull('parent_id')->get();

        // $dataDepartments = $departmentsService->All($filters)->get();
        // $dataPositions = $positionsService->All($filters)->get();

        return view('chartofaccounts::livewire.accounts.partials.form', [
            'data' => $data,
            // 'dataPositions' => $dataPositions,
        ]);
    }
}
