@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-offset-4 col-lg-4" style="margin-top:100px">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="block-unit" style="text-align:center; padding:8px 8px 8px 8px;">
                <img src="{{ URL::asset('/assets/img/logo_red_crow.png') }}" alt="" class="img-circle">
                <br>
                <br>
                <form class="cmxform" id="signupForm" method="post" action="">
                    {!! csrf_field() !!}
                    <fieldset>
                        <p>
                            <input id="username" name="email" type="email" placeholder="Email">
                            <input id="password" name="password" type="password" placeholder="Password">
                        </p>
                        <input class="submit btn-success btn btn-large" type="submit" value="Login">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection