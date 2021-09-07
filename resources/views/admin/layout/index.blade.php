<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>
  <base href="{{asset('')}}">
  @yield('css')

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin_asset_web/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="admin_asset_web/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="admin_asset_web/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="admin_asset_web/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin_asset_web/dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="admin_asset_web/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     @include('admin.layout.header')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  @include('admin.layout.menu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    @yield('content')
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- <script src={{ url('admin_asset_web\ckeditor\ckeditor.js') }}></script>
<script>
    CKEDITOR.replace( 'editor', {

        filebrowserBrowseUrl     : "{{ route('ckfinder_browser') }}",
        filebrowserImageBrowseUrl: "{{ route('ckfinder_browser') }}?type=Images&token=123",
        filebrowserFlashBrowseUrl: "{{ route('ckfinder_browser') }}?type=Flash&token=123",
        filebrowserUploadUrl     : "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files",
        filebrowserImageUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images",
        filebrowserFlashUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Flash",
    } );
    </script>
     @include('ckfinder::setup') -->

<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script src="admin_asset_web/ckfinder/ckfinder.js"></script>


<script src="admin_asset_web/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin_asset_web/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="admin_asset_web/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin_asset_web/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="admin_asset_web/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="admin_asset_web/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="admin_asset_web/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="admin_asset_web/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="admin_asset_web/plugins/jszip/jszip.min.js"></script>
<script src="admin_asset_web/plugins/pdfmake/pdfmake.min.js"></script>
<script src="admin_asset_web/plugins/pdfmake/vfs_fonts.js"></script>
<script src="admin_asset_web/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="admin_asset_web/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="admin_asset_web/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE App -->
<script src="admin_asset_web/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin_asset_web/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="admin_asset_web/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page specific script -->
<!-- bs-custom-file-input -->
<script src="admin_asset_web/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>



<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>


<script>
  $(function () {
    // Summernote
    $('#summernote1').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai",

    });
  })
</script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script src=admin_asset_web\ckeditor\ckeditor.js></script>
    <script>
        CKEDITOR.replace('editor', {


            filebrowserBrowseUrl: "{{ route('ckfinder_browser') }}",
            filebrowserImageBrowseUrl: "{{ route('ckfinder_browser') }}?type=Images&token=123",
            filebrowserFlashBrowseUrl: "{{ route('ckfinder_browser') }}?type=Flash&token=123",
            filebrowserUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files",
            filebrowserImageUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images",
            filebrowserFlashUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Flash",
        });
    </script>
    @include('ckfinder::setup')


    <script type="text/javascript">
        $(document).ready(function () {
            var button1 = document.getElementById('ckfinder-popup-1');

            button1.onclick = function () {
                selectFileWithCKFinder('ckfinder-input-1');
            };

            function selectFileWithCKFinder(elementId) {
                CKFinder.popup({
                    chooseFiles: true,
                    width: 800,
                    height: 600,
                    onInit: function (finder) {
                        finder.on('files:choose', function (evt) {
                            var file = evt.data.files.first();
                            var output = document.getElementById(elementId);
                            var fullurl = new URL(file.getUrl());
                            output.value = fullurl.pathname;
                            console.log(output.value);
                        });

                        finder.on('file:choose:resizedImage', function (evt) {
                            var output = document.getElementById(elementId);
                            output.value = evt.data.resizedUrl;
                        });
                    }
                });
            }
        });
    </script>
@yield('script')

</body>
</html>
