
$(document).ready(function () {
    var datatable;
    datatable = $('#basicDataTable').DataTable({
        "language": {
            "emptyTable": "No records found."
        },
        "pagingType": "full_numbers",
        "iDisplayLength": admin_per_page_limit,
        "lengthMenu": admin_page_limits,
        "serverSide": true,
        "paging": true,
        "ordering": false,
        "info": false,
        "ajax": SITE_URL + '/admin/class/list-ajax',
        "columnDefs": [
            {
                targets: 0,
                data: null,
                render: function (data, type, row) {
                    if (data[0] != '' && data[0] != null) {
                        return data[0];
                    } else {
                        return '';
                    }
                }
            },
            {
                targets: 1,
                data: null,
                render: function (data, type, row) {
                    if (data[1] != '' && data[1] != null) {
                        return data[1];
                    } else {
                        return '';
                    }
                }
            },
            {
                targets: 2,
                data: null,
                render: function (data, type, row) {
                    if (data[2] != '' && data[2] != null) {
                        return data[2];
                    } else {
                        return '';
                    }
                }
            },
            {
                targets: 3,
                data: null,
                render: function (data, type, row) {
                    var action_html = '<a class="btn btn-sm btn-default view-log" href="' + SITE_URL + '/admin/class/edit/' + data[3] + '"><img src="' + SITE_URL + '/assets/admin/images/edit-icon-dark.png"></a>';
//                    action_html += '<a class="btn btn-sm btn-default view-log" href="' + SITE_URL + '/admin/class/delete/' + data[3] + '"><img src="' + SITE_URL + '/assets/admin/images/delete-icon.png"></a>';
                    return action_html;
                }
            }
        ]
    });
});
if ($('.alert').length > 0) {
    setInterval(function () {
        $('.alert').hide();
    }, 2000);
}