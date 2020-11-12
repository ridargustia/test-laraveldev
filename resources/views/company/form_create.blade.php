  @extends('layouts.app')     <!-- Bisa .(titik) atau / -->
  
  @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Form Create Company</div>

                    <div class="card-body">
                        <form method="post" action="/companies" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter your company name" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('name') }}
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Enter your company email" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('email') }}
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLogo" class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-10">
                                <input type="file" name="logo" class="form-control {{ $errors->has('logo') ? ' is-invalid' : '' }}" id="logo" value="{{ old('logo') }}">
                                @if ($errors->has('logo'))
                                    <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('logo') }}
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputWebsite" class="col-sm-2 col-form-label">Website</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('website') ? ' is-invalid' : '' }}" id="website" placeholder="Enter your company website" name="website" value="{{ old('website') }}">
                                @if ($errors->has('website'))
                                    <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('website') }}
                                    </span>
                                @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection
