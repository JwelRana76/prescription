
@props(['id', 'dataUrl', 'columns'])


        <table class="table table-striped w-100" id="{{ $id }}">

            <thead>
                <tr>
                    <th width="50px">
                        <label for="dtb_all_selector_{{ $id }}"
                            class="itd-checkbox">
                            <input type="checkbox"
                                id="dtb_all_selector_{{ $id }}"
                                class="custom-checkbox" />
                            <span class="checkmark"></span>
                        </label>
                    </th>

                    @foreach ($columns as $column)
                        <th>
                            {{ ucwords(implode(' ', explode('_', $column['name']))) }}
                        </th>
                    @endforeach
                </tr>
            </thead>

            <tbody></tbody>

            <tfoot>
                <tr>
                    <th></th>

                    @foreach ($columns as $column)
                        <th></th>
                    @endforeach
                </tr>
            </tfoot>

        </table>


<style>
    thead {
        background: var(--sidebar-color) !important;
        color: var(--light-color);
    }

    .table_card_body {
        overflow-x: auto;
        max-width: 100%;
    }

    .table_card_body table {
        width: 100%;
        table-layout: fixed;
    }
</style>

@push('js')
<script>
    $(document).ready(function () {

        const selector = @json($id);
        const columns = @json($columns);
        const dataUrl = @json($dataUrl);

        // Add checkbox column at the beginning
        const tableColumns = [
            {
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false
            },
            ...columns
        ];

        const table = itd_makeDataTable(
            '#' + selector,
            dataUrl,
            tableColumns
        );

        // Select all checkboxes
        $('#dtb_all_selector_' + selector).on('change', function () {

            const checked = $(this).is(':checked');

            $(table.rows({ page: 'current' }).nodes())
                .find('.row-checkbox')
                .prop('checked', checked);

        });

        // Update select-all checkbox
        $(document).on('change', '#' + selector + ' .row-checkbox', function () {

            const total = $('#' + selector + ' .row-checkbox').length;

            const checked = $('#' + selector + ' .row-checkbox:checked').length;

            $('#dtb_all_selector_' + selector)
                .prop('checked', total > 0 && total === checked);

        });

    });
</script>
@endpush
