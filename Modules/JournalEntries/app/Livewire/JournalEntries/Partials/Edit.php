<?php

namespace Modules\JournalEntries\Livewire\JournalEntries\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\JournalEntries\Models\JournalEntry;
use Modules\Core\Traits\HandlesRoundingDifference;
use Modules\JournalEntries\Livewire\JournalEntries\GetData;
use Modules\ChartOfAccounts\Interfaces\AccountServiceInterface;
use Modules\JournalEntries\Http\Requests\JournalEntryUpdateRequest;
use Modules\JournalEntries\Interfaces\JournalEntryServiceInterface;

class Edit extends BaseComponent
{
    use HandlesRoundingDifference;

    /** @var JournalEntry|null */
    public $model = null;

    // public string $tilte = 'JournalEntries';
    public string $tilteModal = 'Edit';
    public  $subTilteModal = 'Journal Entry';
    // public string $tilte_lower = 'JournalEntries';
    public string $modal_id = 'edit';

    public string $value = 'Update';
    public string $classBtn = 'success';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    public ?int $id = null;
    public string $date;
    public string $status = '';

    public ?string $reference_type = null;
    public ?string $reference_id = null;
    public ?string $description = null;

    public array $items = [];

    protected $listeners = ['edit_journal_entry'];

    public function edit_journal_entry($id)
    {
        $this->model = JournalEntry::findOrFail($id);

        // dd($this->model);
        if (!$this->model) {
            // Show error alert
            $this->errorAlert();
            return;

        }

        // Set the properties
        $this->id = $this->model->id;
        $this->date = $this->model->date->format('Y-m-d');
        $this->description = $this->model->description;
        $this->status = $this->model->status->value;

        $this->items = $this->model->items->toArray();


        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('edit-journal-entry-modal');
    }
    public function addRow()
    {
        $this->items[] = ['account_id' => null, 'debit' => 0, 'credit' => 0, 'description' => null, 'cost_center_id' => null];
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
        return (new JournalEntryUpdateRequest($this->model?->id))->rules();
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

        $this->model->items()->delete();

         $entry = $service->update($this->model, $validated);


        foreach ($this->items as $item) {

           $entry->items()->create([
                'account_id' => $item['account_id'],
                'debit' => $item['debit'],
                'credit' => $item['credit'],
                'description' => $item['description'],
                // 'creator_type' => get_class(Auth::user()),
                // 'creator_id' => Auth::id(),
            ]);
        }
        $this->handlesRoundingDifference($entry);

        $this->reset();

        // Close the modal on the frontend
        $this->closeModal('edit-journal-entry-modal');

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
        // $this->closeModal('create-journal-entry-modal');
        $this->dispatch('refreshData')->to(GetData::class);
    }

    public function render(AccountServiceInterface $service)
    {

        $filters = [];
        // $data = $service->All($filters)->with(['children'])->whereNull('parent_id')->get();
        $data = $service->All($filters)->with(['children', 'journalEntryItems'])->whereNull('parent_id')
        ->withCount(['children', 'journalEntryItems'])->get();
        return view('journalentries::livewire.journalentries.partials.form', [
            'data' => $data,
        ]);
    }
}
