@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   <a href="/create_post" class="btn btn-primary">Create Post</a>
                   <a href="/view_post" class="btn btn-primary float-right">View Post</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
