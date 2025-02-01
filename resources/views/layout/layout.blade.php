<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.1/css/buttons.dataTables.css">
    <title>Codeplateau</title>
    {{-- @vite('resources/css/app.css') --}}
</head>
<style>
    #file-dropzone {
        border: 0.5px dashed;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        background-color: #1e1e1e;
    }

    .dropzone-valid-label {
        font-size: 13px;
    }
</style>

<body>
    @yield('content')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/buttons/3.2.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.print.min.js"></script>
<script>
    Dropzone.options.fileDropzone = {
        paramName: "file",
        maxFilesize: 50,
        addRemoveLinks: true,
        dictRemoveFile: "Remove",
        dictCancelUpload: "Cancel",
        dictInvalidFileType: "You can only upload CSV files.",
        acceptedFiles: ".csv",
        dictDefaultMessage: "Drop files here or click to upload",
        autoProcessQueue: false,
        maxFiles: 1,
        init: function() {
            var myDropzone = this;

            myDropzone.on("addedfile", function() {
                $(".dz-progress").hide();
            });

            document.getElementById("upload-button").addEventListener("click", function() {
                if (myDropzone.getQueuedFiles().length > 0) {
                    myDropzone.processQueue();
                } else {
                    toastr.error("Please select a file before uploading.");
                }
            });

            myDropzone.on("uploadprogress", function(file, progress) {
                $(".dz-progress").show();
                $(".dz-progress .dz-upload").width(progress + '%');
            });

            myDropzone.on("complete", function(file) {
                if (myDropzone.getUploadingFiles().length === 0) {
                    $(".dz-progress").hide();
                }
            });

            myDropzone.on("error", function(file, response) {
                console.log(response);

                if (response.errors) {
                    myDropzone.removeFile(file);
                    response.errors.forEach((error) => {
                        toastr.error(error);
                    });
                } else if (response.message) {
                    toastr.error(response.message);
                }
            });

            myDropzone.on("success", function(file, response) {
                const data = response.data;
                if (response.code === 200) {
                    $('#example').show();
                    $('#example_wrapper').show();
                    if ($.fn.DataTable.isDataTable('#example')) {
                        $('#example').DataTable().clear().destroy();
                    }
                    const table = $('#example').DataTable({
                        layout: {
                            // topStart: {
                            //     buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                            // }
                        },
                    });

                    table.clear();
                    const headers = data.header;
                    const headerRow = headers.map(header => `<th>${header}</th>`).join('');
                    $('#example thead').html(`<tr>${headerRow}</tr>`);
                    data.data.forEach((item) => {
                        table.row.add(item);
                    });

                    table.draw();
                    myDropzone.removeFile(file);
                } else {
                    $('#example_wrapper').hide();
                    toastr.error(response.message);
                    myDropzone.removeFile(file);
                }
            });
        }
    };

    $(document).ready(function() {
        $('.dz-button').addClass('h-100');
        $('#example').hide();
        if (typeof $.fn.dataTable !== 'undefined') {
            $.fn.dataTable.ext.errMode = 'none';
        } else {
            console.error('DataTables library is not loaded.');
        }
    });
</script>

</html>
