$(document).ready(function() {
    const resultsTable = $('.results-table').DataTable({
        "order": [[1, 'desc']],
        "autoWidth": false,
        "columnDefs": [
            {"className": "dt-body-center", "targets": "_all"}
        ],
        dom: 'Brt',
        'columns': [
            {"data": "ip"},
            {"data": "date"},
            {"data": "preciptype"},
            {"data": "conditions"}
        ],
    });

    $.get('/retrieveData/' + ip, function(response) {
        resultsTable.clear().rows
            .add(response.data).columns
            .adjust()
            .draw();
    });
});
