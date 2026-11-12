
@props(['id', 'dataUrl', 'columns'])

<table class="table table-striped w-100" id="{{ $id }}">

    <thead>
        <tr>
            <th width="60px">SL No.</th>

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

        // Add SL No. column at the beginning
        const tableColumns = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
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

    });
</script>
@endpush
