<!-- Start Create Form -->
<div class="card">
    <form id="form">
        <div class="card-header">
            <h3 class="card-title">{{ __('New Manual Journal Entry') }}</h3>
        </div>
        <div class="card-body">

            {{-- التاريخ والمرجع والوصف --}}
            <div class="row">

                <x-core::form.fields.input
                    type="date"
                    name="date"
                    labelText="{{ __('Date') }}"
                    placeholder="{{ __('Date') }}"
                    :isLivewire="true"
                    divClass="col-md-3"
                    inputClass=""
                    otherAttributes="required autofocus"
                />

                <x-core::form.fields.textarea
                    name="description"
                    labelText="{{ __('Description') }}"
                    placeholder="{{ __('Enter Description Here') }}..."
                    rows="5"
                    class="col-md-9"
                />

            </div>

            {{-- العناصر --}}
            <div class="table-responsive">
                <button type="button" wire:click="addRow" class="btn btn-outline-primary btn-md my-2">
                    <i class="bx bx-plus"></i>{{ __('Add Row') }}
                </button>
                <table class="table table-bordered text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>{{ __('Account') }}</th>
                            <th>{{ __('Debit') }}</th>
                            <th>{{ __('Credit') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $index => $item)
                            <tr wire:key="item-{{ $index }}">
                                <td>

                                    <x-core::form.fields.select
                                        name="items.{{ $index }}.account_id"
                                        labelText="Parent Account"
                                        placeholder="Select a Account"
                                        :isLivewire="true"
                                        :isLabel="false"
                                        divClass=""
                                        labelClass=""
                                        selectClass="select2"
                                        otherAttributes=""
                                    >
                                        @forelse ($dataAccounts as $value)
                                            <option value="{{ $value->id }}" wire:key="type-{{ $value->id }}" >{{ $value->code }} - {{ $value->name }}</option>

                                        @empty
                                            <option value="0" wire:key="type-none">No Accounts Available</option>
                                        @endforelse
                                    </x-core::form.fields.select>
                                </td>

                                <td>
                                    <x-core::form.fields.input
                                        type="number"
                                        name="items.{{ $index }}.debit"
                                        labelText="{{ __('Ddebit') }}"
                                        placeholder="{{ __('Enter Ddebit Here') }}"
                                        :isLivewire="true"
                                        :isLabel="false"
                                        divClass=""
                                        inputClass=""
                                        otherAttributes=""
                                    />

                                </td>

                                <td>
                                    <x-core::form.fields.input
                                        type="number"
                                        name="items.{{ $index }}.credit"
                                        labelText="{{ __('Credit') }}"
                                        placeholder="{{ __('Enter Credit Here') }}"
                                        :isLivewire="true"
                                        :isLabel="false"
                                        divClass=""
                                        inputClass=""
                                        otherAttributes=""
                                    />
                                </td>

                                <td>
                                    <x-core::form.fields.input
                                        type="text"
                                        name="items.{{ $index }}.description"
                                        labelText="{{ __('Description') }}"
                                        placeholder="{{ __('Enter Comment Here') }}"
                                        :isLivewire="true"
                                        :isLabel="false"
                                        divClass=""
                                        inputClass=""
                                        otherAttributes=""
                                    />

                                </td>

                                <td>
                                    <button type="button" wire:click="removeRow({{ $index }})" class="btn btn-sm btn-danger">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        {{-- </div> --}}
        <div class="card-footer">
            <x-core::form.fields.button-submit  clickBtn="submit()" target="submit" />

        </div>
    </form>
</div>



<!-- End Create Form -->

