@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Borrow Books'])
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">

                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Book Shelf</h6>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">

                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Title</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Author</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Edition</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID</th>
                                        <th class="text-secondary opacity-7"></th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Available Copies</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($arr as $b)
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                <img src="{{ asset('storage/' . $b->image) }}"  class="avatar avatar-sm me-3"
                                                    >
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$b->title}}</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$b->authors}}</p>

                                        </td>
                                        <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$b->edition}}</p>

                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$b->id}}</span>
                                        </td>
                                        <td class="align-middle">
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$b->copies}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                          <form action="{{ route('books.add', $b->id) }}" method="POST">
                                                  @csrf
                                                
                                             <button class="btn btn-primary btn-sm ms-auto">Borrow</button>
                                          </form>

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
