@extends('layouts.app')     <!-- Bisa .(titik) atau / -->
  
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('status'))
                    <div class="alert alert-success mt-3">
                        {{ session('status') }}
                    </div>
                @endif
            
                <div class="card">
                    <div class="card-header">Employee</div>

                    <div class="card-body">
                        <a href="/employees/create" class="btn btn-primary">Add Employee</a>
                        <ul class="list-group mt-3">
                            @foreach( $employees as $employee )
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $employee->name }}
                                    <a href="/employees/{{ $employee->id }}" class="badge badge-info">Detail</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-3">
                            {{$employees->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection