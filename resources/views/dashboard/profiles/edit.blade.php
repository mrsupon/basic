@extends("dashboard.layouts.dashboards_master")

@section("page_content")

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile Page</h4>
                        <form method="POST" action="{{ route('dashboard.profiles.update',['id'=> $users->id]) }}" enctype="multipart/form-data"  >
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="name" name="name" value="{{ $users->name }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="username" name="username" value="{{ $users->username }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="email" name="email" value="{{ $users->email }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="profile_image_filename" class="col-sm-2 col-form-label">Profile image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="profile_image_filename" name="profile_image_filename" value="">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="profile_image" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="profile_image" name="profile_image" class="rounded avatar-xl" src="{{ !empty($users->profile_image)? url('dashboards/profiles/uploadedImages/'.$users->profile_image): url('dashboards/profiles/uploadedImages/no_image.jpg')  }}" alt="Image Format Error">
                                </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" value="Update Profile" class="btn btn-primary btn-rounded waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#profile_image_filename').change(function(e){
                var reader = new FileReader();
                reader.readAsDataURL(e.target.files['0']);
                reader.onload = function(e){
                    $('#profile_image').attr('src', e.target.result);
                }

            });
        });

    </script>
@endsection
