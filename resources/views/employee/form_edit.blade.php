  @extends('layouts.app')   
  
  @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Form Edit Employee</div>

                    <div class="card-body">
                        <form method="post" action="/employees/{{ $employee->id }}">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter employee name" name="name" value="{{ $employee->name }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('name') }}
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputCompany" class="col-sm-2 col-form-label">Company</label>
                                <div class="col-sm-10">
                                <select name="id_company" class="col-7 form-control {{ $errors->has('id_company') ? ' is-invalid' : '' }}">
                                    <option value="">--Pilih--</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}" 
                                        @if($employee->id_company === $company->id)
                                            selected
                                        @endif> 
                                        {{$company->name}} </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_company'))
                                    <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('id_company') }}
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Enter employee email address" name="email" value="{{ $employee->email }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('email') }}
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection
