@props([
    'columns',
    'data'
])
@foreach($data as $row)
    <tr class="bg-white" wire:key="{{ $row->{$this->uniqueRowId()} }}">
        @foreach($columns as $column)
            <td nowrap wire:key="{{ $column->key . $column->sortColumn }}">
                {!! is_null($column->callback) ? "{$row->{$column->key}}" : $column->callback($row->{$column->key}) !!}
            </td>
        @endforeach
    </tr>
@endforeach
@if(count($data) === 0)
    <tr>
        <td colspan="{{ count($columns) }}" class="text-center">No records found.</td>
    </tr>
@endif
