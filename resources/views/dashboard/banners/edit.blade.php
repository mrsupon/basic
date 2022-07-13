@extends("dashboard.layouts.main_master")

@section("page_content")
<!-- banners.edit -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Banner Page</h4>
                    <form method="POST" action="{{ route('dashboard.banners.update',['id'=> $banners->id]) }}" enctype="multipart/form-data"  >
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="title" name="title" value="{{ $banners->title }}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="content" name="content" value="{{ $banners->content }}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="video_url" name="video_url" value="{{ $banners->video_url }}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="banner_image_filename" class="col-sm-2 col-form-label">Banner image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="banner_image_filename" name="banner_image_filename" value="">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="banner_image" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img id="banner_image" name="banner_image" class="rounded avatar-xl" src="{{ !empty($banners->image)? url('backend/banners/uploadedImages/'.$banners->image): url('backend/banners/uploadedImages/no_image.jpg')  }}" alt="Image Format Error">
                            </div>
                        </div>
                        <!-- end row -->

                        <input type="submit" value="Update Banner" class="btn btn-primary btn-rounded waves-effect waves-light">
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#banner_image_filename').change(function(e){
            var reader = new FileReader();
            reader.readAsDataURL(e.target.files['0']);
            reader.onload = function(e){
                $('#banner_image').attr('src', e.target.result);
            }

        });
    });
</script>

@endsection
