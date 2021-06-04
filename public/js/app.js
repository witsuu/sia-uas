$(function() {
    $("#dataTableDashboard").DataTable({
        searching: false,
        ordering: false,
        info: false
    });
    $("#dataTable").DataTable({
        info: false,
        ordering: false
    });
    $("#dataTableDetail").DataTable({
        info: false,
        paging: false,
        searching: false,
        ordering: false
    });
});
