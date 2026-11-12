
function itd_makeDataTable(e = "", n = "", t = []) {

    // Get card header
    const cardHeader = $(e)
        .closest('.card')
        .find('.card-header h3')
        .first()
        .text()
        .trim();

    const table = new DataTable(e, {

        processing: true,
        serverSide: true,

        ajax: n,

        pageLength: 10,

        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],

        fixedHeader: {
            header: true,
        },

        dom:
            "<'row mb-3'<'col-md-4'l><'col-md-4 text-center'B><'col-md-4'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row mt-3'<'col-md-5'i><'col-md-7'p>>",

        buttons: [

            // Copy
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i>',
                className: 'btn btn-sm btn-secondary'
            },

            // Excel
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i>',
                className: 'btn btn-sm btn-success'
            },

            // PDF
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i>',
                className: 'btn btn-sm btn-danger'
            },

            // Print
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i>',
                className: 'btn btn-sm btn-primary',

                title: '',
                exportOptions: {
                    columns: ':visible'
                },
                messageTop: function () {

                    return '<h2 class="text-center">' +
                        $('<div>').text(cardHeader).html() +
                        '</h2>';
                },

                customize: function (win) {

                    $(win.document.body).css('font-size', '12px');

                    $(win.document.body).find('h2').css({
                        'text-align': 'center',
                        'font-size': '22px',
                        'font-weight': 'bold',
                        'margin-bottom': '20px'
                    });

                    $(win.document.body).find('table')
                        .addClass('table-bordered')
                        .css('font-size', '12px');
                }
            },

            // Column Visibility
            {
                extend: 'colvis',
                text: '<i class="fas fa-eye"></i>',
                className: 'btn btn-sm btn-info',   
                columns: ':not(.noVis)'
            }

        ],

        columns: t,

        footerCallback: function (row, data, start, end, display) {

            const api = this.api();

            // Convert value to number
            const numberValue = function (value) {

                if (typeof value === 'number') {
                    return Number.isFinite(value) ? value : null;
                }

                if (typeof value !== 'string') {
                    return null;
                }

                let cleaned = value.trim().replace(/,/g, '');

                if (cleaned === '') {
                    return null;
                }

                cleaned = cleaned.replace(/[^\d.-]/g, '');

                if (
                    cleaned === '' ||
                    !/^-?\d+(\.\d+)?$/.test(cleaned)
                ) {
                    return null;
                }

                const number = Number(cleaned);

                return Number.isFinite(number) ? number : null;
            };

            // Automatically detect numeric columns
            api.columns().every(function (columnIndex) {

                const column = this;

                const values = column
                    .data({ page: 'current' })
                    .toArray();

                const footer = $(column.footer());

                if (!footer.length) {
                    return;
                }

                footer.html('');

                const nonEmptyValues = values.filter(function (value) {

                    return value !== null &&
                        value !== undefined &&
                        value !== '';

                });

                if (nonEmptyValues.length === 0) {
                    return;
                }

                const numericValues = nonEmptyValues.map(numberValue);

                const isNumeric = numericValues.every(function (value) {

                    return value !== null;

                });

                if (!isNumeric) {
                    return;
                }

                // Current page total
                const total = numericValues.reduce(function (sum, value) {

                    return sum + value;

                }, 0);

                footer.html(
                    total.toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    })
                );

                footer.css({
                    'font-weight': 'bold',
                    'text-align': 'left'
                });

            });

            // First column footer label
            if (api.column(0).footer()) {
                $(api.column(0).footer()).html('Total:');
            }

        }

    });

    return table;
}
