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
                    <div class="card-header">Company</div>

                    <div class="card-body">
                        <a href="/companies/create" class="btn btn-primary">Add Company</a>
                        <ul class="list-group mt-3">
                            @foreach( $companies as $company )
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $company->name }}
                                    <a href="/companies/{{ $company->id }}" class="badge badge-info">Detail</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-3">
                            {{$companies->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection