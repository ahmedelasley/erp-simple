<?php

namespace Modules\JournalEntries\Livewire\Accounts;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\JournalEntries\Models\Account;
use Modules\JournalEntries\Interfaces\AccountServiceInterface;

class GetData extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $search = '';
    public string $searchField = 'code';
    public string $sortField = 'code';
    public string $sortDirection = 'asc';
    public int $paginate = 10;
    public int $page = 1;


    protected $listeners = [
        'refreshData' => 'refreshComponent',
        'show_Account' => '$refresh',
        'edit_Account' => '$refresh',
        // 'toggle_status_Account' => '$refresh',
        'delete_Account' => '$refresh',

    ];

    protected function queryString(): array
    {
        return [
            'search' => ['except' => '', 'as' => 'q'],
            'page'   => ['except' => 1],
        ];
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
        $this->search = '';
    }

    public function updatingPaginate(): void
    {
        $this->resetPage();
    }

    public function searchFilter(string $field): void
    {
        $this->searchField = $field;
        $this->resetPage();
    }

    public function sortBy(string $field ): void
    {
        $this->sortField = !$field ? 'created_at' : $field;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';

        $this->resetPage();
    }

    /**
     * Refresh the component and reset pagination.
     */
    public function selectPaginate(int $count = 10): void
    {
        $this->paginate = $count;
        $this->resetPage();
    }

    public function refreshComponent(): void
    {
        $this->resetPage();
        $this->dispatch('reinit-datatable');
    }

    // resetSearch
    public function resetSearch(): void
    {
        $this->search = '';
        $this->resetPage();
        $this->searchField = 'code';
    }

    public function render()
    {
        // $filters = [];

        // $data = $service->All($filters)->with(['children', 'journalEntryItems'])->whereNull('parent_id')
        // // ->withCount(['children', 'journalEntryItems']) // جلب عدد الأبناء تلقائيًا
        // // ->get();
        // ->when($this->search, fn($q) => $q->where($this->searchField, 'like', '%' . $this->search . '%'))
        // ->orderBy($this->sortField, $this->sortDirection)
        // ->paginate($this->paginate);


        return view('journalentries::livewire.journalentries.get-data', [
            // 'data' => $data,
        ]);
    }


}
