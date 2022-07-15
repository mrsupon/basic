@extends("dashboard.layouts.main_master")

@section("page_content")
<!-- banners.edit -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Icons for About</h4>
                    <form method="POST" action="" enctype="multipart/form-data"  >
                        @csrf
                        <br><br>
                        <div class="row mb-3">
                            <label for="image_filename" class="col-sm-2 col-form-label">Icons</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="image_filename" name="image_filename[]" value="" multiple="">
                            </div>
                        </div>

                        <input type="submit" value="Update About" class="btn btn-primary btn-rounded waves-effect waves-light">
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-sm-12">
            <h4 class="my-3">Show Icons</h4>
            <div class="row" id="preview" data-masonry='{"percentPosition": true }'>

                <!-- <div class="col-3 col-sm-2 col-lg-1">
                    <div class="card">
                        <img id="image" name="image" class="card-img-top" src="{{ url('backend/abouts/icons/uploadedImages/no_image.jpg')  }}" alt="Image Format Error">
                    </div>
                </div> -->

            </div>
        </div>

    </div> <!-- end row -->



</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image_filename').change(function(e){
            var reader = new FileReader();
            reader.readAsDataURL(e.target.files['0']);
            reader.onload = function(e){
                $('#image').attr('src', e.target.result);
            }

        });
    });
</script>
<script type="text/javascript">
    function previewImages() {

        var preview = document.querySelector('#preview');
        var i = 0;

        if (this.files) {
            [].forEach.call(this.files, readAndPreview);
        }

        function readAndPreview(file) {

            // Make sure `file.name` matches our extensions criteria
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            } // else...

            var reader = new FileReader();

            reader.addEventListener("load", function() {
                var html = "";
                html += "<div class='col-3 col-sm-2 col-lg-1'><span class='badge rounded-pill bg-success float-none'>"+ ++i +"</span> <div class='card'>" ;
                html += "<img class='card-img-top' src='"+this.result+"'' alt='Image Format Error' >" ;
                html += "</div></div>"

                $("#preview").append(html);
            });

            reader.readAsDataURL(file);

        }

    }

    document.querySelector('#image_filename').addEventListener("change", previewImages);
</script>

@endsection

