 
@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('clients.store')}}" method="post">
            @csrf

            <div class="input-group mb-3">
                <input type="text" class="form-control" name="name_en" placeholder="Full name EN">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="name_ar" placeholder="Full name AR">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="phone" class="form-control" placeholder="phone">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            
            <div class="input-group mb-3">
                
                <select @class(['form-control', 'is-invalid' => $errors->has('country_id')]) name="country_id" data-placeholder="Select a country">
                    <option value=""></option>
                    @foreach (App\Models\Country::all() as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">login</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

       
    </div>
  
@endsection
