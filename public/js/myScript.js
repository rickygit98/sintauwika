
$(document).ready(function () {
    const btnTolak = document.querySelectorAll('#btnTolak');
    const btnTerima = document.querySelectorAll('#btnTerima');
    const status = document.querySelectorAll('#status');


    //ambil element button index ke i dan ubah value input hidden index ke i juga
    for (let i = 0; i < btnTolak.length; i++) {
        btnTolak[i].addEventListener('click', function (e) {
            status[i].value = 'Ditolak';
        });
        btnTerima[i].addEventListener('click', function (e) {
            status[i].value = 'Diterima';
        });
    }


    const btnApprove = document.querySelectorAll('#btnApprove');
    const statusSkripsi = document.querySelectorAll('#statusSkripsi');

    for (let j = 0; j < btnApprove.length; j++) {
        btnApprove[j].addEventListener('click', function (e) {
            statusSkripsi[j].value = 'Approve';
        });
    }
});




