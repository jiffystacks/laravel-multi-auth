@extends('layouts.auth')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                         Hi there, regular user

                        @haveaccess("seller.view")
                            <h3>Can view seller</h3>
                        @endhaveaccess

                        @haveaccess("seller.delete")
                            <h3>Can delete seller</h3>
                        @else
                            <h3>Can't delete seller</h3>
                        @endhaveaccess

                        @haveaccess("driver.delete")
                            <h3>Can delete driver</h3>
                        @elsehaveaccess("driver.update")
                            <h3>Can update driver</h3>
                        @else
                            <h3>Can't delete or update driver</h3>
                        @endhaveaccess
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection