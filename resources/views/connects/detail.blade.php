@extends('layouts.master')

@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fixed">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-body">
            <form>
              @method('patch')
              @csrf
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="user_name" class="form-control" value="{{ $connects->user_name}}" readonly>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="user_email" class="form-control" value="{{ $connects->user_email}}" readonly>
              </div>
              <div class="form-group">
                <label>Message</label>
                <textarea type="text" name="message" class="form-control" cols="30" rows="10" readonly>{{ $connects->message}}</textarea>
              </div>
              {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop