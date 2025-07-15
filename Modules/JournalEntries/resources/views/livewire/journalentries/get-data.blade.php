
<div class="col-xl-12">
    <div class="card">
        <div class="card-title d-flex justify-content-between flex-wrap">
            <div class="d-flex justify-content-start m-3">

                <x-core::form.fields.search />

                <x-core::form.fields.button-filter
                    :searchField="$searchField"
                    :items="[
                        ['label' => 'Code', 'field' => 'code'],
                        ['label' => 'Name', 'field' => 'name'],
                    ]"
                />

                <x-core::form.fields.button-export
                    :items="[
                        ['label' => __('Export PDF'), 'event' => 'exportPDF'],
                        ['label' => __('Export Excel'), 'event' => 'exportExcel'],
                        ['label' => __('Export CSV'), 'event' => 'exportCSV'],
                        ['divider' => true],
                        ['label' => __('Export PDF to Mail'), 'event' => 'exportPDF'],
                        ['label' => __('Export Excel to Mail'), 'event' => 'exportExcel'],
                        ['label' => __('Export CSV to Mail'), 'event' => 'exportCSV'],
                    ]"
                />

                <x-core::form.fields.button-import />

            </div>

            <x-core::form.fields.paginate :paginate="$paginate" :items="[10, 25, 50, 100, 200, 500]" />

        </div>
        <div class="card-body">
            <div class="table-responsive hoverable-table">

                <table class="table table-striped table-bordered table-hover text-md-wrap text-start">
                    <tr class="bg-dark fs-14 text-bold text-white text-center">
                        <th>{{ __('Account') }}</th>
                        {{-- <th class="text-center">{{ __('Debit') }}</th>
                        <th class="text-center">{{ __('Credit') }}</th> --}}
                        <th class="text-center">{{ __('Balance') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                    <tbody>
                        @foreach ($data as $account)
                            @include('chartofaccounts::livewire.accounts.partials.account-row', ['account' => $account, 'level' => 1, 'depth' => 0])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex flex-row justify-content-end">
                <div class="pagination pagination-primary text-center">
                    {{ $data->withQueryString()->onEachSide(0)->links() }} {{-- Laravel pagination links --}}
                </div>
            </div>
        </div>
    </div>
</div>
