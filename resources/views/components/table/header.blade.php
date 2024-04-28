@section('title')
    {{ ucwords(str_replace('-', ' ', Request::segment(3))) }}
@endsection

@if(!empty($titleAction))
    @section('title_action')
        {!! $titleAction !!}
    @endsection
@endif

@props([
    'columns',
    'filters',
    'sorting',
])

<tr>
    <form id="tableFilters">
        @foreach($columns as $column)
            <th class="pr-2" wire:key="{{ $column->key . $column->sortColumn }}">
                @switch($column->filter)
                    @case(\App\Enums\Livewire\Table\FilterTypeEnum::SELECT_LIKE)
                    @case(\App\Enums\Livewire\Table\FilterTypeEnum::SELECT)
                        <select class="form-control"
                                wire:change="filter('{{ $column->searchColumn }}', '{{ $column->filter->value }}', $event.target.value)">
                            <option value="">All</option>
                            @foreach($column->filterSelection as $selection)
                                <option
                                    wire:key="{{ $selection['id'] }}"
                                    value="{{ $selection['id'] }}"
                                    @selected($this->getCurrentFilter($column->searchColumn) == $selection['id'])
                                >
                                    {{ $selection['value'] }}
                                </option>
                            @endforeach
                        </select>

                        @break

                    @case(\App\Enums\Livewire\Table\FilterTypeEnum::DATE)
                        @php
                            $default = $this->getCurrentFilter($column->searchColumn);

                            $start = is_array($default) ? ($default[0] ?? '') : '';
                            $end = is_array($default) ? ($default[1] ?? '') : '';
                        @endphp

                        <input type="text"
                               autocomplete="off"
                               class="form-control date-range"
                               data-searchColumn="{{ $column->searchColumn }}"
                               data-filter="{{ $column->filter->value }}"
                               data-default-start="{{ $start }}"
                               data-default-end="{{ $end }}"
                        />

                        @break

                    @case(\App\Enums\Livewire\Table\FilterTypeEnum::RANGE)
                        @php
                            $default = $this->getCurrentFilter($column->searchColumn);

                            $start = is_array($default) ? ($default[0] ?? '') : '';
                            $end = is_array($default) ? ($default[1] ?? '') : '';
                        @endphp

                        <div class="number-range" wire:ignore>
                            <span class="badge badge-dark amount-display"></span>
                            <div
                                class="form-control range"
                                data-min="{{ floor($column->minAndMax[0]) }}"
                                data-max="{{ ceil($column->minAndMax[1]) }}"
                                data-searchColumn="{{ $column->searchColumn }}"
                                data-default-start="{{ $start }}"
                                data-default-end="{{ $end }}"
                            ></div>
                        </div>

                        @break

                    @case(\App\Enums\Livewire\Table\FilterTypeEnum::STRING)
                        <input type="text"
                               wire:input.debounce="filter('{{ $column->searchColumn }}', '{{ $column->filter->value }}', $event.target.value)"
                               class="form-control"
                               value="{{ $this->getCurrentFilter($column->searchColumn) }}"
                        />

                        @break

                    @case(\App\Enums\Livewire\Table\FilterTypeEnum::NONE)
                        @break
                @endswitch
            </th>
        @endforeach
    </form>
</tr>

<tr>
    @foreach($columns as $column)
        <th wire:key="{{ $column->key . $column->sortColumn }}">
            <div @if($column->filter !== \App\Enums\Livewire\Table\FilterTypeEnum::NONE)wire:click="sort('{{ $column->sortColumn }}')"@endif class="d-flex cursor-pointer align-items-center">
                <h5 class="me-2">{{ $column->label }}</h5>

                @if(($sorting['b'] ?? null) === $column->sortColumn && $column->filter !== \App\Enums\Livewire\Table\FilterTypeEnum::NONE)
                    <i class="fa fa-arrow-{{ $sorting['d'] === 'asc' ? 'up' : 'down' }} text-primary mb-2"></i>
                @endif
            </div>
        </th>
    @endforeach
</tr>
