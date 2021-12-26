function ajaxGetAll() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '/admin/skripsi/all',
        success: function (skripsi) {
            let data = ""
            $.each(skripsi, function (key, value) {
                data = data + "<tr data-widget='expandable-table' aria-expanded='false'>"
                data = data + "<td>" + value.id + "</td>"
                data = data + "<td>" + value.topik_id + "</td>"
                data = data + "<td>"
                data = data + "<a href='/admin/skripsi/" + value.id + "' class='badge bg-primary p-2'><i class='fas fa-eye fa-lg'></i></a>"
                data = data + "</td>"
                data = data + "</tr>"
                data = data + "<tr class='expandable-body d-none'>"
                data = data + "<td colspan='3'>"
                data = data + "<p style='display: none;'>"
                data = data + value.comment
                data = data + "</p>"
                data = data + "</td>"
                data = data + "</tr>"
            })
            $('#body_skripsi').html(data);
        }
    });
}
ajaxGetAll();