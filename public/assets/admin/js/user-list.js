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
        "ajax": SITE_URL + '/admin/user/list-ajax',
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
                    if (data[3] != '' && data[3] != null) {
                        return data[3];
                    } else {
                        return '';
                    }
                }
            },
            {
                targets: 4,
                data: null,
                render: function (data, type, row) {
                    if (data[4] != '' && data[4] != null) {
                        return data[4];
                    } else {
                        return '';
                    }
                }
            },
            {
                targets: 5,
                data: null,
                render: function (data, type, row) {
                    if (data[5] != '' && data[5] != null) {
                        return data[5];
                    } else {
                        return '';
                    }
                }
            },
            {
                targets: 6,
                data: null,
                render: function (data, type, row) {
                    if (data[6] != '' && data[6] != null) {
                        return data[6];
                    } else {
                        return '';
                    }
                }
            },
            {
                targets: 7,
                data: null,
                render: function (data, type, row) {
                    if (data[7] != '' && data[7] != null) {
                        return data[7];
                    } else {
                        return '';
                    }
                }
            },
            {
                targets: 8,
                data: null,
                render: function (data, type, row) {
                    if (data[8] != '' && data[8] != null) {
                        return data[8];
                    } else {
                        return '';
                    }
                }
            },
            {
                targets: 9,
                data: null,
                render: function (data, type, row) {
                    if (data[9] != '' && data[9] != null) {
                        return data[9];
                    } else {
                        return '';
                    }
                }
            },
            {
                targets: 10,
                data: null,
                render: function (data, type, row) {
                    if (data[10] != '' && data[10] != null) {
                        return data[10];
                    } else {
                        return '';
                    }
                }
            },
            {
                targets: 11,
                data: null,
                render: function (data, type, row) {
//                    var action_html = '<a class="btn btn-sm btn-default view-log" href="' + SITE_URL + '/admin/user/delete/' + data[11] + '"><img src="' + SITE_URL + '/assets/admin/images/delete-icon.png"></a>';
                    var action_html = '<a class="btn btn-sm btn-default view-log" href="' + SITE_URL + '/admin/user/edit/' + data[11] + '"><img src="' + SITE_URL + '/assets/admin/images/edit-icon-dark.png"></a>';
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