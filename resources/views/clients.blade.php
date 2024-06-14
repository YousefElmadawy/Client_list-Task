@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-3 ">
            <a href="{{ route('clients.create') }}">
                <button type="submit" class="btn btn-primary btn-block">Add User</button>
            </a>
            <hr>

        </div>

        <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 590px;">
                    <input type="text" name="name_en" class="form-control float-right mx-2 " placeholder="name_en"
                        value="{{ request('name_en') }}">
                    <input type="text" name="name_ar" class="form-control float-right mx-2 " placeholder="name_ar"
                        value="{{ request('name_ar') }}">
                    <input type="text" name="phone" class="form-control float-right mx-2 " placeholder="phone"
                        value="{{ request('phone') }}">


                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary btn-block">
                            Filter <i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client Name</th>
                        <th>Client Name (Arabic)</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>phone</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($clients as $client)
                   
                        <?php $i++; ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $client->name_en }} </td>
                            <td> {{ $client->name_ar }}</td>
                            <td> {{ $client->country->name}}</td>
                            <td> {{ $client->email }}</td>
                            <td> {{ $client->phone }}</td>
                            {{-- <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Actions</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon"
                                        data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href=" "><i class="fas fa-edit"></i>
                                            Edit</a>
                                        <form action="" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"><i class="fas fa-trash"></i>
                                                Delete</a>
                                        </form>
                                    </div>
                                </div>

                            </td> --}}

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    {{ $clients->withQueryString()->links() }}
@endsection
