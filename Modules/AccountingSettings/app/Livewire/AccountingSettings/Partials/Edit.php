<?php

namespace Modules\AccountingSettings\Livewire\AccountingSettings\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\AccountingSettings\Models\AccountingSetting;
use Modules\ChartOfAccounts\Interfaces\AccountServiceInterface;

use Modules\AccountingSettings\Livewire\AccountingSettings\GetData;
use Modules\AccountingSettings\Http\Requests\AccountingSettingUpdateRequest;
use Modules\AccountingSettings\Interfaces\AccountingSettingServiceInterface;

class Edit extends BaseComponent
{

    /** @var AccountingSetting|null */
    public $model = null;

    // public string $tilte = 'AccountingSettings';
    public string $tilteModal = 'Edit';
    public  $subTilteModal = 'Accounting Setting';
    // public string $tilte_lower = 'AccountingSettings';
    public string $modal_id = 'edit';

    public string $value_modal = 'Update';
    public string $classBtn = 'success';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    public ?int $id = null;
    public ?string $key = null;
    public ?string $value = null;
    public ?string $default_value = null;
    public ?string $description = null;
    public ?string $icon = null;
    public string $data_type = '';
    public string $type = '';








    protected $listeners = ['edit_accounting_setting'];

    public function edit_accounting_setting($id, AccountingSettingServiceInterface $service)
    {
        // $this->model = AccountingSetting::findOrFail($id);
        $this->model = $service->find($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;

        }

        // Set the properties
        $this->id = $this->model->id;
        $this->key = $this->model->key;
        $this->value = $this->model->value;
        $this->default_value = $this->model->default_value;
        $this->description = $this->model->description;
        $this->icon = $this->model->icon;
        $this->data_type = $this->model->data_type->value;
        $this->type = $this->model->type->value;

        // $this->date = $this->model->date->format('Y-m-d');
        // $this->description = $this->model->description;
        // $this->status = $this->model->status->value;

        // $this->items = $this->model->items->toArray();


        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('edit-accounting-setting-modal');
    }

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new AccountingSettingUpdateRequest($this->model?->id))->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }


    public function submit(AccountingSettingServiceInterface $service): void
    {
        $validated = $this->validate();


        $service->update($this->model, $validated);


        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('edit-accounting-setting-modal');

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
        // $this->closeModal('create-accounting-setting-modal');
        $this->dispatch('refreshData')->to(GetData::class);
    }

    public function render(AccountServiceInterface $accountServiceInterface)
    {
        $filters = [];
        // $data = $service->All($filters)->with(['children'])->whereNull('parent_id')->get();
        $dataAccounts = $accountServiceInterface->All($filters)->with(['children', 'journalEntryItems'])->whereNull('parent_id')
        ->withCount(['children', 'journalEntryItems'])->get();

        return view('accountingsettings::livewire.accountingsettings.partials.form',[
            'dataAccounts' => $dataAccounts,
        ]);
    }
}
