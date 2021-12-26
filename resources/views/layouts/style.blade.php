<!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href={{ asset('/adminlte/plugins/fontawesome-free/css/all.min.css') }}>
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
    href={{ asset('/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}>
<!-- iCheck -->
<link rel="stylesheet" href={{ asset('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}>
<!-- JQVMap -->
<link rel="stylesheet" href={{ asset('/adminlte/plugins/jqvmap/jqvmap.min.css') }}>
<!-- Theme style -->
<link rel="stylesheet" href={{ asset('/adminlte/dist/css/adminlte.min.css') }}>
<!-- overlayScrollbars -->
<link rel="stylesheet" href={{ asset('/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>
<!-- Daterange picker -->
<link rel="stylesheet" href={{ asset('/adminlte/plugins/daterangepicker/daterangepicker.css') }}>
<!-- summernote -->
<link rel="stylesheet" href={{ asset('/adminlte/plugins/summernote/summernote-bs4.min.css') }}>

{{-- OTHER LINK --}}

{{-- FontAwesome Kit --}}
<script src="https://kit.fontawesome.com/cedc7b6ee2.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href={{ asset('/css/trix.css') }}>
<script src={{ asset('/js/trix.js') }}></script>

<link rel="stylesheet" href={{ asset('/css/toastr.min.css') }}>

<link rel="stylesheet" href={{ asset('/css/jquery.datetimepicker.min.css') }}>

<style>
    .addremoved {
        display: none;
    }

    nav svg {
        max-height: 20px;
    }

</style>

<link rel="stylesheet" href={{ asset('/css/myStyle.css') }}>

@livewireScripts
