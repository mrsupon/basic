@extends("dashboard.layouts.dashboards_master")

@section("page_content")


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <br>
                    <center><img class="rounded-circle avatar-xl" src="{{ asset('dashboards/assets/images/users/avatar-1.jpg') }}" alt="Profile image cap"></center>
                    <div class="card-body">
                        <h4 class="card-title">{{ $users->name }}</h4>
                        <p class="card-text">   Username: {{ $users->username }}<br>
                                                Email: {{ $users->email }}</p>
                        <a href="{{ route('dashboard.profiles.edit', ['id'=> $users->id]) }}" class="btn btn-primary btn-rounded waves-effect waves-light">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
