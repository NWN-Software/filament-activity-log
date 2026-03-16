@if (!empty($value))
    @php
        $fields = $field->table->getFields();
        $isHtmlAllowed = $field->isHtmlAllowed();
    @endphp

    <div class="w-full overflow-x-auto border border-gray-200 dark:border-white/5 rounded-lg">
        <table>
            <thead>
                @foreach ($fields as $field)
                    <th class="!p-2">
                        {{ $field->getLabel() }}
                    </th>
                @endforeach
            </thead>


            @foreach ($value as $item)
                <tr>
                    @foreach ($fields as $field)
                        <td class="p-2 align-top">
                            @php
                                $rawValue = $item[$field->name] ?? data_get($item, $field->name);
                                $dispayValue = $field->display($rawValue);
                            @endphp

                            @if ($isHtmlAllowed)
                                {!! $dispayValue !!}
                            @else
                                {{ $dispayValue }}
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
@endif
