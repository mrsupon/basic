@extends("dashboard.layouts.dashboards_master")

@section("page_content")


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <img class="rounded-circle avatar-xl" src="{{ asset('dashboards/assets/images/users/avatar-1.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
