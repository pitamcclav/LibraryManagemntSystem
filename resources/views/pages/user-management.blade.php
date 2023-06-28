@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>USERS</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        UserName</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @foreach($student as $s)
                                    <td>
                                        
                                    <p class="text-sm font-weight-bold mb-0">{{$s->id}}</p>
                                    </td>
                                    <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$s->username}}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                    <p class="text-sm font-weight-bold mb-0">{{$s->email}}</p>
                                    </td>
                                </tr>

                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @include('layouts.footers.auth.footer')
    </div>
@endsection
