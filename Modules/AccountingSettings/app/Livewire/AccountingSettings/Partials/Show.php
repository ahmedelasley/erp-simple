<?php

namespace Modules\JournalEntries\Livewire\JournalEntries\Partials;

use Modules\Core\Livewire\BaseComponent;
use Modules\JournalEntries\Livewire\JournalEntries\GetData;
use Modules\JournalEntries\Interfaces\JournalEntryServiceInterface;
use Modules\JournalEntries\Models\JournalEntry;

class Show extends BaseComponent
{

    /** @var JournalEntry|null */
    public $model = null;

    // public string $tilte = 'JournalEntries';
    public string $tilteModal = 'Show';
    public  $subTilteModal = 'Journal Entry';
    // public string $tilte_lower = 'JournalEntries';
    public string $modal_id = 'show';

    public string $value = 'Show';
    public string $classBtn = 'primary';
    public string $clickBtn = 'submit';
    public string $target = 'submit';


    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;
    public $children = null;

    protected $listeners = ['show_journal_entry'];

    public function show_journal_entry($id)
    {
        $this->model = JournalEntry::findOrFail($id);

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
        // $this->children = $this->model?->children;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->openModal('show-journal-entry-modal');
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

    public function render(JournalEntryServiceInterface $service)
    {

        $filters = [];

        $data = $service->All($filters)->with(['items'])->withCount('items')->get();

        return view('journalentries::livewire.journalentries.partials.form', [
            'data' => $data,
        ]);
    }
}
