@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('contact-us-send') }}" style="margin: 20px 20px;" enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="clientName" name="clientName" placeholder="name">
                        <input type="text" id="email" name="email" placeholder="email">
                        <input type="text" id="company" name="company" placeholder="company">
                        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="phone number">
                        <input type="text" id="jobTitle" name="jobTitle" placeholder="job title">
                        <input type="text" id="message" name="message" placeholder="message">
                        <input type="file" id="file" name="file">

                        <input type="hidden" id="recaptcha" name="recaptcha"> 

                        <input type="submit" name="Submit" class="btn btn-success">
                    </form>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contact-us-subscribe') }}" style="margin: 20px 20px;" enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="email" name="email" placeholder="name">
                        <input type="submit" name="Submit" class="btn btn-warning">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js?render=6LePCLkZAAAAAMyFcaUgCTOhAZGhV9tG4cdm7mAf"></script>
<script>
      
        grecaptcha.ready(function() {
          grecaptcha.execute('6LePCLkZAAAAAMyFcaUgCTOhAZGhV9tG4cdm7mAf', {action: 'contact'}).then(function(token) {
              if(token){
                  document.getElementById('recaptcha').value = token;
              }
          });
        });
      
  </script>

@endsection