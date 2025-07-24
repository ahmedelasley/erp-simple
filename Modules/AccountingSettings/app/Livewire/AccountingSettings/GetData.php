<?php

namespace Modules\AccountingSettings\Livewire\AccountingSettings;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\AccountingSettings\Interfaces\AccountingSettingServiceInterface;

class GetData extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $search = '';
    public string $searchField = 'key';
    public string $sortField = 'key';
    public string $sortDirection = 'desc';
    public int $paginate = 10;
    public int $page = 1;


    protected $listeners = [
        'refreshData' => 'refreshComponent',
        'show_journal_entry' => '$refresh',
        'edit_journal_entry' => '$refresh',
        // 'toggle_status_journal_entry' => '$refresh',
        'delete_journal_entry' => '$refresh',

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
        $this->searchField = 'key';
    }

    public function render(AccountingSettingServiceInterface $service)
    {
        $filters = [];

        $data = $service->All($filters)
        // ->with(['parent']) // جلب علاقة الأب مباشرة
        // ->withCount('children') // جلب عدد الأبناء تلقائيًا
        ->when($this->search, fn($q) => $q->where($this->searchField, 'like', '%' . $this->search . '%'))
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate($this->paginate);


        return view('accountingsettings::livewire.accountingsettings.get-data', [
            'data' => $data,
        ]);
    }


}
