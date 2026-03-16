<table class="w-full overflow-hidden text-sm !table-fixed">
    <thead>
        <th width="20%" class="!py-2">
            @lang('filament-activity-log::activities.table.field')
        </th>
        <th width="80%" class="!py-2">
            @lang('filament-activity-log::activities.table.value')
        </th>
    </thead>

    @foreach ($changes['attributes'] as $key => $value)
        @php
            $field = $logger->getFieldByName($key);
            if (!$field) {
                continue;
            }
        @endphp

        <tr>
            <td class="px-4 py-2 align-top sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                {{ $field->getLabel() }}
            </td>

            <td class="px-4 py-2 align-top overflow-x-auto">
                {{ $field->display($value) }}
            </td>
        </tr>
    @endforeach
</table>
