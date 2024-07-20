<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Form Demo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <!-- Form container -->
    <div class="container-md my-5">
        <div class="col-xxl-5 col-xl-6 col-lg-8 mx-auto">
            <h1 class="h1 fw-bold mb-5">Laravel 10 dropzone image upload with other form fields and validation</h1>
            <div class="alert alert-success d-none mb-4" id="successMessage">The form was submitted successfully.</div>
            <form class="dropzone overflow-visible p-0" id="formDropzone" method="POST" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label text-muted opacity-75 fw-medium" for="formName">Name</label>
                    <input class="form-control border-2 shadow-none fw-bold p-3" id="formName" name="name"
                        type="text" required>
                    <div class="invalid-feedback fw-bold">The name field is required.</div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label text-muted opacity-75 fw-medium" for="formEmail">Email</label>
                    <input class="form-control border-2 shadow-none fw-bold p-3" id="formEmail" name="email"
                        type="email" required>
                    <div class="invalid-feedback fw-bold">The email field is required.</div>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label text-muted opacity-75 fw-medium" for="formImage">Image</label>
                    <div class="dropzone-drag-area form-control" id="previews">
                        <div class="dz-message text-muted opacity-50" data-dz-message>
                            <span>Drag file here to upload</span>
                        </div>
                        <div class="d-none" id="dzPreviewContainer">
                            <div class="dz-preview dz-file-preview">
                                <div class="dz-photo">
                                    <img class="dz-thumbnail" data-dz-thumbnail>
                                </div>
                                <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times">
                                        <path fill="#FFFFFF"
                                            d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="invalid-feedback fw-bold">Please upload an image.</div>
                </div>
                <button class="btn btn-primary fw-medium py-3 px-4 mt-3" id="formSubmit" type="submit">
                    <span class="spinner-border spinner-border-sm d-none me-2" aria-hidden="true"></span>
                    Submit Form
                </button>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        /**
         * Setup dropzone
         */
        $('#formDropzone').dropzone({
            previewTemplate: $('#dzPreviewContainer').html(),
            url: '/panel/user/image',
            addRemoveLinks: true,
            autoProcessQueue: false,
            uploadMultiple: false,
            parallelUploads: 1,
            uploadMultiple: true,
            acceptedFiles: '.jpeg, .jpg, .png, .gif',
            thumbnailWidth: 900,
            thumbnailHeight: 600,
            previewsContainer: "#previews",
            timeout: 0,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                myDropzone = this;

                // when file is dragged in
                this.on('addedfile', function(file) {
                    $('.dropzone-drag-area').removeClass('is-invalid').next('.invalid-feedback').hide();
                });
            },
            success: function(file, response) {
                // hide form and show success message
                $('#formDropzone').fadeOut(600);
                setTimeout(function() {
                    $('#successMessage').removeClass('d-none');
                }, 600);
                console.log(response);
            }
        });

        /**
         * Form on submit
         */
        $('#formSubmit').on('click', function(event) {
            event.preventDefault();
            var $this = $(this);

            // show submit button spinner
            $this.children('.spinner-border').removeClass('d-none');

            // validate form & submit if valid
            if ($('#formDropzone')[0].checkValidity() === false || !myDropzone.getQueuedFiles().length > 0) {
                event.stopPropagation();

                // show error messages & hide button spinner    
                $('#formDropzone').addClass('was-validated');
                $this.children('.spinner-border').addClass('d-none');

                // if dropzone is empty show error message
                if (!myDropzone.getQueuedFiles().length > 0) {
                    console.log('ax bezar');
                    $('.dropzone-drag-area').addClass('is-invalid').next('.invalid-feedback').show();
                }
            } else {

                // if everything is ok, submit the form
                myDropzone.processQueue();

            }
        });
    </script>
</body>

</html>
