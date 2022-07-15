@extends("dashboard.layouts.main_master")

@section("page_content")
<!-- banners.edit -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit About Data</h4>
                    <form method="POST" action="{{ route('dashboard.abouts.update',['id'=> $abouts->id]) }}" enctype="multipart/form-data"  >
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="title" name="title" value="{{ $abouts->title }}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label">Experience Content</label>
                            <div class="col-sm-10">
                                <textarea required="" class="form-control" id="experience_content" name="experience_content" rows="2">{{ $abouts->experience_content }}</textarea>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="description">{{ $abouts->description }}</textarea>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="experience_icon_filename" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="experience_icon_filename" name="experience_icon_filename" value="">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="experience_icon" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img id="experience_icon" name="experience_icon" class="rounded avatar-xl" src="{{ !empty($abouts->experience_icon)? url('backend/abouts/uploadedImages/'.$abouts->experience_icon): url('backend/abouts/uploadedImages/no_image.png')  }}" alt="Image Format Error">
                            </div>
                        </div>
                        <!-- end row -->

                        <input type="submit" value="Update About" class="btn btn-primary btn-rounded waves-effect waves-light">
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#experience_icon_filename').change(function(e){
            var reader = new FileReader();
            reader.readAsDataURL(e.target.files['0']);
            reader.onload = function(e){
                $('#experience_icon').attr('src', e.target.result);
            }

        });
    });
</script>

@endsection

