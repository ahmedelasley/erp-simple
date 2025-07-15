<?php

namespace Modules\JournalEntries\Livewire\JournalEntries\Partials;

use Modules\ChartOfAccounts\Services\AccountService;
use Modules\Core\Livewire\BaseComponent;
use Modules\JournalEntries\Livewire\JournalEntries\GetData;
use Modules\JournalEntries\Http\Requests\JournalEntryStoreRequest;
use Modules\JournalEntries\Interfaces\AccountServiceInterface;

use Modules\Departments\Interfaces\DepartmentServiceInterface;

use Modules\Positions\Interfaces\PositionServiceInterface;

class Create extends BaseComponent
{
    public string $titleModal = 'Create';
    public string $subTitleModal = 'Journal Entry';
    public string $modal_id = 'create';

    public string $date;
    public ?string $reference_type = null;
    public ?string $reference_id = null;
    public ?string $description = null;

    public array $items = [];


    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->items = [
            ['account_id' => null, 'debit' => 0, 'credit' => 0, 'cost_center_id' => null],
            ['account_id' => null, 'debit' => 0, 'credit' => 0, 'cost_center_id' => null],
        ];
    }

    public function addRow()
    {
        $this->items[] = ['account_id' => null, 'debit' => 0, 'credit' => 0, 'cost_center_id' => null];
    }

    public function removeRow($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new JournalEntryStoreRequest())->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }


    // public function submit(JournalEntryServiceInterface $service): void
    // {
    //     $validated = $this->validate();

    //     $service->create($validated);


    //     $this->reset();

    //     // Close the modal on the frontend
    //     $this->closeModal('create-account-modal');

    //     // Refresh the Account table
    //     $this->dispatch('refreshData')->to(GetData::class);

    //     // Show success alert
    //     $this->successAlert();

    // }


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

    public function render( AccountService $accountService)
    {

        $filters = [];
        // // $data = $service->All($filters)->with(['children'])->whereNull('parent_id')->get();
        // $data = $service->All($filters)->with(['children', 'journalEntryItems'])->whereNull('parent_id')
        // ->withCount(['children', 'journalEntryItems'])->get();

        $dataAccounts = $accountService->All($filters)->get();
        // $dataPositions = $positionsService->All($filters)->get();

        return view('journalentries::livewire.journalentries.partials.create', [
            // 'data' => $data,
            'dataAccounts' => $dataAccounts,
        ]);
    }
}
