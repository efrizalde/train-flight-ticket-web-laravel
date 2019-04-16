// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable();

    $('#dataTablePesanan').DataTable({
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(),
                data;

           var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\Rp,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };

            total = api
                .column(6)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            pageTotal = api
                .column(6, {
                    page: 'current'
                })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(3).footer()).html(
                'Rp ' + pageTotal
            );
        }
    });
});

function doPrintTable() {
    $('#dataTablePesanan').printThis();
}
