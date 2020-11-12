  @extends('layouts.app')     <!-- Bisa .(titik) atau / -->

  @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            
                <div class="card">
                    <div class="card-header">Detail Company</div>

                    <div class="card-body">
                        <form>
                        {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" placeholder="Enter your company name" name="name" value="{{ $company->name }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" placeholder="Enter your company email" name="email" value="{{ $company->email }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLogo" class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-10">
                                <img src="{{ url('storage/company/'.$company->logo) }}" height="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputWebsite" class="col-sm-2 col-form-label">Website</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="website" placeholder="Enter your company website" name="website" value="{{ $company->website }}" disabled>
                                </div>
                            </div>
                            
                        </form>

                        <a href="{{ $company->id }}/edit" class="btn btn-primary">Edit</a>

                        <form action="/companies/{{ $company->id }}" method="post" class="d-inline">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="/companies" class="card-link">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection
