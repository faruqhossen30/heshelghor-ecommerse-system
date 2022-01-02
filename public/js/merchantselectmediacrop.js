$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
        $galleryModal = $('#gallerymodal');
        $('#thumbnail').on('click', function(){
            $galleryModal.modal('show');
        });
    });

    var $modal = $('#modal');
    var selectImage = document.getElementById('selectimage');
    var cropper;
    $("body").on("change", ".selectimage", function (e) {
        alert('tesing')
        var files = e.target.files;

        var done = function (url) {
            selectImage.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                // console.log(URL.createObjectURL)

                done(URL.createObjectURL(file));
            } else if (FileReader) {
                console.log(FileReader)
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $modal.on('shown.bs.modal', function () {

        cropper = new Cropper(selectImage, {
            aspectRatio: 1,
            viewMode: 2,
            preview: '.preview',
            zoomOnWheel: true,
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    // For Editing Image
    $('#roatedPlus').click(function () {
        cropper.rotate(90)
    });
    $('#roatedMinus').click(function () {
        cropper.rotate(-90)
    });
    $('#roatedReset').click(function () {
        cropper.reset()
    });


    $("#crop").click(function () {
        var fileName = $('.selectImage');
        var newFileName = fileName[0].files[0].name
        console.log();
        canvas = cropper.getCroppedCanvas({
            width: 1000,
            height: 1000,
        });

        canvas.toBlob((blob) => {
            const formData = new FormData();

            // Pass the image file name as the third parameter if necessary.
            formData.append('croppedImage', blob, newFileName);

            // Use `jQuery.ajax` method for example
            $.ajax({
                url: '/merchant/galary/sotre',
                method: 'POST',
                dataType: "json",
                data: formData,
                processData: false,
                contentType: false,
                success(data) {
                    $modal.modal('hide');
                    $('.collapse').collapse('hide')
                    console.log(data);
                },
                error() {
                    console.log('Upload error');
                },
            });
        } /*, 'image/png' */);
    })





});





