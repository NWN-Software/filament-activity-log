<table class="w-full overflow-hidden text-sm !table-fixed">
    <thead>
        <th width="20%" class="!py-2">
            @lang('filament-activity-log::activities.table.field')
        </th>
        <th width="40%" class="!py-2">
            @lang('filament-activity-log::activities.table.old')
        </th>
        <th width="40%" class="!py-2">
            @lang('filament-activity-log::activities.table.new')
        </th>
    </thead>

    @foreach ($changes['attributes'] as $key => $newValue)
        @php
            $field = $logger->getFieldByName($key);
            if (!$field) {
                continue;
            }

            $oldValue = $changes['old'][$key] ?? null;

            if ($field->display($oldValue, raw: true) === $field->display($newValue, raw: true)) {
                // Skip display if it's the same value.
                continue;
            }
        @endphp

        <tr>
            <td class="px-4 py-2 align-top sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                {{ $field->getLabel() }}
            </td>

            @if ($field->is('difference'))
                <td colspan="2" class="px-4 py-2 align-top break-all !whitespace-normal">
                    {{ view('filament-activity-log::components.difference', [
                        'options' => $field->options,
                        'oldValue' => $field->display($oldValue, raw: true),
                        'newValue' => $field->display($newValue, raw: true),
                    ]) }}
                </td>
            @else
                <td class="px-4 py-2 align-top overflow-x-auto">
                    {{ $field->display($oldValue) }}
                </td>

                <td class="px-4 py-2 align-top overflow-x-auto">
                    {{ $field->display($newValue) }}
                </td>
            @endif

        </tr>
    @endforeach
</table>
