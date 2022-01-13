$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function(){
    //     $mediaModal = $('#mediaModal');
    //     $('#thumbnail').on('click', function(){
    //         $mediaModal.modal('show');
    //     });
    // });

    var $mediaCropModal = $('#mediaCropModal');
    var mediaImage = document.getElementById('mediaimage');
    var cropper;
    $(document).on("change", ".mediaImage", function (e) {
        $mediaModal.hide()
        alert('tesing')
        var files = e.target.files;

        var done = function (url) {
            mediaImage.src = url;
            $mediaCropModal.modal('show');
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
    $mediaCropModal.on('shown.bs.modal', function () {


        cropper = new Cropper(mediaImage, {
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
        var fileName = $('.mediaImage');
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
                    $mediaCropModal.modal('hide');
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





