{{-- Scripts Section --}}

@livewireScripts

<!-- jQuery -->
<script src="{{ asset('/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('/adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('/adminlte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('/adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('/adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src="{{ asset('/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/adminlte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes for themes controller right navbar -->
{{-- <script src="/adminlte/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) for graph calendar other widgets-->
{{-- <script src="/adminlte/dist/js/pages/dashboard.js"></script> --}}

{{-- JQUERY --}}

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>

<script src="{{ asset('/js/jquery.datetimepicker.full.min.js') }}"></script>

<script src="{{ asset('/js/toastr.min.js') }}"></script>


{{-- Sweet Alert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function changeRole(role) {
        if (role == 1) {
            document.getElementById("an").classList.remove("addremoved")
            document.getElementById("ln").classList.add("addremoved")
            document.getElementById("sn").classList.add("addremoved")
        } else if (role == 2) {
            document.getElementById("ln").classList.remove("addremoved")
            document.getElementById("an").classList.add("addremoved")
            document.getElementById("sn").classList.add("addremoved")

        } else if (role == 3) {
            document.getElementById("sn").classList.remove("addremoved")
            document.getElementById("an").classList.add("addremoved")
            document.getElementById("ln").classList.add("addremoved")
        } else {
            document.getElementById("sn").classList.add("addremoved")
            document.getElementById("an").classList.add("addremoved")
            document.getElementById("ln").classList.add("addremoved")
        }
    }
</script>

{{-- Notification and Toastr --}}
<script>
    $(document).ready(function() {
        toastr.options = {
            "positionClass": "toast-bottom-right",
            "progressBar": false,
        }

        window.addEventListener('MhsAdded', () => {
            console.log('ok');
            $('#addMhs').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        })

        window.addEventListener('MhsUpdated', () => {
            console.log('ok');
            $('#editMhs').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        })

        window.addEventListener('DsnAdded', () => {
            console.log('ok');
            $('#addDsn').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        })

        window.addEventListener('DsnUpdated', () => {
            console.log('ok');
            $('#editDsn').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        })
    });
</script>

{{-- Date Time Picker --}}
<script>
    jQuery.datetimepicker.setDateFormatter('moment')
    $('#tgl_sidang').datetimepicker({
        timepicker: true,
        datepicker: true,
        format: 'YYYY-MM-DD HH:mm', //format date time picker
        hours24: true,
        step: 30,
    })

    $('#toggle_sidang').on('click', function() {
        $('#tgl_sidang').datetimepicker('toggle')
    })

    $('#tgl_seminar').datetimepicker({
        timepicker: true,
        datepicker: true,
        format: 'YYYY-MM-DD HH:mm', //format date time picker
        hours24: true,
        step: 30,
    })

    $('#toggle_seminar').on('click', function() {
        $('#tgl_seminar').datetimepicker('toggle')
    })
</script>

{{-- Delete Confirmation --}}
<script>
    window.addEventListener('showDeleteConfirmation', event => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                //kirim konfirmasi ke listener di livewire controller
                livewire.emit('deleteConfirmed');
            }
        })
    })

    window.addEventListener('deleted', event => {
        Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
    })
</script>

<script src="{{ asset('/js/myScript.js') }}"></script>
