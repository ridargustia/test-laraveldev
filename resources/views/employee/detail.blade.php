  @extends('layouts.app')     <!-- Bisa .(titik) atau / -->

  @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            
                <div class="card">
                    <div class="card-header">Detail Employee</div>

                    <div class="card-body">
                        <form>
                        {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $result[0]->name_employee }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Company</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="company" name="company" value="{{ $result[0]->name_company }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email"  name="email" value="{{ $result[0]->email }}" disabled>
                                </div>
                            </div>
                        </form>

                        <a href="{{ $result[0]->id }}/edit" class="btn btn-primary">Edit</a>

                        <form action="/employees/{{ $result[0]->id }}" method="post" class="d-inline">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="/employees" class="card-link">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection
