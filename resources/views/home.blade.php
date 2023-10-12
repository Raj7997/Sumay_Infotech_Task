@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('user-message') }}">Add Short Text From Here</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h3><p> Here Below Show User Messages : <p></h3>
                    @if(isset($userMessages))
                        @foreach($userMessages as $message)
                            <p>{{ $message->message }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
