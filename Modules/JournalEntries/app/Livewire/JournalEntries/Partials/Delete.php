<?php

namespace Modules\JournalEntries\Livewire\JournalEntries\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\JournalEntries\Livewire\JournalEntries\GetData;
use Modules\JournalEntries\Interfaces\JournalEntryServiceInterface;
use Modules\ChartOfAccounts\Interfaces\AccountServiceInterface;
use Modules\JournalEntries\Models\JournalEntry;

class Delete extends BaseComponent
{

    /** @var JournalEntry|null */
    public $model = null;

    // public string $tilte = 'JournalEntries';
    public string $tilteModal = 'Delete';
    public  $subTilteModal = 'Journal Entry';
    // public string $tilte_lower = 'JournalEntries';
    public string $modal_id = 'delete';

    public string $value = 'Yes';
    public string $classBtn = 'danger';
    public string $clickBtn = 'submit';
    public string $target = 'submit';

    protected $listeners = ['delete_journal_entry'];

    public function delete_journal_entry($id, JournalEntryServiceInterface $service)
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
        $this->openModal('delete-journal-entry-modal');
    }


    public function submit(JournalEntryServiceInterface $service): void
    {


        $this->model->items()->delete();
        $service->delete($this->model);

        $this->close();

        // Close the modal on the frontend
        $this->closeModal('delete-journal-entry-modal');

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
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
        // $this->closeModal('create-journal-entry-modal');
        $this->dispatch('refreshData')->to(GetData::class);
    }

    public function render(AccountServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->get();

        return view('journalentries::livewire.journalentries.partials.form', [
            'data' => $data,
        ]);
    }
}
