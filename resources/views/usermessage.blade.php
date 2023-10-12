@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Message</div>
                <div class="card-body">
                    <form action="{{ route('store-user-message') }}" id="user-message-form" method="post" data-parsley-validate>
                        @csrf
                        <div class="row">
                            <label>Short Message</label>
                            <input type="text" id="message" name="message" value="{{old('message')}}" data-parsley-required data-parsley-required-message="Please Enter Short Message" data-parsley-minlength="2" data-parsley-minlength-message="Short Message Required Minimum 2 Characters" data-parsley-maxlength="25" data-parsley-maxlength-message="Short Message Required Maximum 25 Characters" data-parsley-errors-container="#message_error">
                            <span id="message_error" class="error_msg">{{$errors->first('message')}}</span>
                        </div>
                        <div class="row">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection