
@extends('layouts.master')

@section('content')

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
@if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

<!-- CONTENT -->
{!! csrf_field() !!}
<div class="row">
    <div class="col-sm-12 col-lg-12">
        <h4>
            <strong>Manage Users</strong>&nbsp;<span><button class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal">+ New</button></span>
        </h4>
        <table class="display" id="dt1">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Date of Birth</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user) { ?>
                <tr class="odd" data-id="{{$user->id}}">
                    <td class="text_editable" id="{{$user->id}}#username">{{ $user->username }}</td>
                    <td class="text_editable" id="{{$user->id}}#email">{{ $user->email }}</td>
                    <td class="text_editable" id="{{$user->id}}#mobile">{{ $user->mobile }}</td>
                    <td class="date_editable" id="{{$user->id}}#date_of_birth">{{ $user->date_of_birth }}</td>
                    <td class="center"><button type="button" class="btn btn-xs btn-danger delete" data-id="{{$user->id}}">x</button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table><!--/END SECOND TABLE -->
    </div><!--/span12 -->
</div><!-- /row -->
<br />
<br />
<!-- Modal -->

  <div class="modal fade" id="myModal" role="dialog">
      <form role="form" method="post">
          {!! csrf_field() !!}
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <div class="modal-header" style="background-color: green;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> New User Form</h4>
        </div>
        <div class="modal-body">
          
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
            </div>
            <div class="form-group">
              <label for="username">Mobile:</label>
              <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}">
            </div>
            <div class="form-group">
              <label for="DateOfBirth">Date of birth:</label>
              <input type="text" class="form-control" id="DateOfBirth" name="date_of_birth" value="{{ old('date_of_birth') }}">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" name="password">
            </div>
            <div class="form-group">
              <label for="pwd_confirm">Confirm Password:</label>
              <input type="password" class="form-control" id="pwd_confirm" name="password_confirmation">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
      </form>
  </div>
@endsection