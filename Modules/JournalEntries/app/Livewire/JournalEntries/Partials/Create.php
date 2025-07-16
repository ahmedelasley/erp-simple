<?php

namespace Modules\JournalEntries\Livewire\JournalEntries\Partials;

use Modules\ChartOfAccounts\Services\AccountService;
use Modules\Core\Livewire\BaseComponent;
use Modules\JournalEntries\Livewire\JournalEntries\GetData;
use Modules\JournalEntries\Http\Requests\JournalEntryStoreRequest;
use Illuminate\Support\Facades\Auth;
use Modules\JournalEntries\Interfaces\JournalEntryServiceInterface;

class Create extends BaseComponent
{
    public string $titleModal = 'Create';
    public string $subTitleModal = 'Journal Entry';
    public string $modal_id = 'create';

    public string $date;
    public string $status = '';

    public ?string $reference_type = null;
    public ?string $reference_id = null;
    public ?string $description = null;

    public array $items = [];

    protected $listeners = [
        'refreshData' => '$refresh',
        // 'show_Account' => '$refresh',
        // 'edit_Account' => '$refresh',
        // 'toggle_status_Account' => '$refresh',
        // 'delete_Account' => '$refresh',

    ];

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


    public function submit(JournalEntryServiceInterface $service): void
    {
        $validated = $this->validate();

        // $entry = JournalEntry::create([
        //     'entry_number' => 1,
        //     'date' => $this->date,
        //     // 'reference' => $this->reference,
        //     'description' => $this->description,
        //     'creator_type' => get_class(Auth::user()),
        //     'creator_id' => Auth::id(),
        // ]);

        // foreach ($this->items as $item) {
        //     $entry->items()->create([
        //         'account_id' => $item['account_id'],
        //         'debit' => $item['debit'],
        //         'credit' => $item['credit'],
        //         'description' => $item['description'],
        //         'creator_type' => get_class(Auth::user()),
        //         'creator_id' => Auth::id(),
        //     ]);
        // }

        $entry = $service->create($validated);

        // foreach ($this->items as $item) {
        //     $entry->items()->create([
        //         'account_id' => $item['account_id'],
        //         'debit' => $item['debit'],
        //         'credit' => $item['credit'],
        //         'description' => $item['description'],
        //         'creator_type' => get_class(Auth::user()),
        //         'creator_id' => Auth::id(),
        //     ]);
        // }




        foreach ($this->items as $item) {

           $entry->items()->create([
                'account_id' => $item['account_id'],
                'debit' => $item['debit'],
                'credit' => $item['credit'],
                'description' => $item['description'],
                'creator_type' => get_class(Auth::user()),
                'creator_id' => Auth::id(),
            ]);
        }
            $debitTotal = collect($this->items)->sum('debit');
            $creditTotal = collect($this->items)->sum('credit');

            $roundingDifference = round($debitTotal - $creditTotal, 2);

            if (abs($roundingDifference) >= 0.01) {
            $roundingAccount = 2;
            $entry->items()->create([
                    'account_id' => $roundingAccount,
                    'debit' => $roundingDifference < 0 ? abs($roundingDifference) : 0,
                    'credit' => $roundingDifference > 0 ? $roundingDifference : 0,
                    'description' => 'فرق تقريب تلقائي',
                    'creator_type' => get_class(Auth::user()),
                    'creator_id' => Auth::id(),
                ]);

            }

        $this->reset();

    //     // Close the modal on the frontend
    //     $this->closeModal('create-account-modal');

    //     // Refresh the Account table
        // $this->dispatch('refreshData')->to(GetData::class);
        $this->dispatch('refreshData')->self();

        // return redirect()->route('journalentries.index');

    //     // Show success alert
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
