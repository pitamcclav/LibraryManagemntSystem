@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Library Report</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        BOOK TITLE</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Authors</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        EDITION</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        BOOK ID</th>
                                        <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        USER ID</th>
                                        <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        RETURN DATE</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                               @foreach($report as $r)
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('storage/' . $r->cover_page) }}"  class="avatar avatar-sm me-3"
                                                    >
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$r->bok_title}}</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <p class="text-xs font-weight-bold mb-0">{{$r->authors}}</p>

                                        </td>
                                        <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$r->book_edition}}</p>

                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$r->book_id}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$r->user_id}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$r->return_date}}</span>
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
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>USERS FEEDBACK</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        USER ID</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        MESSAGE</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                               @foreach($comment as $c)
                                        <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$c->user_id}}</h6>

                                                </div>
                                        </td>
                                        <td>

                                            <p class="text-xs font-weight-bold mb-0">{{$c->message}}</p>

                                        </td>
                                        <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$c->created_at}}</p>

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
