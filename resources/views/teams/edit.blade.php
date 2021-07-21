@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
          <div class="container-fixed">
            <div class="row">
              <div class="col-md-12">
                <div class="panel-body">
                  <form action="{{ url('teams/' .$teams->id) }}" method="post" enctype="multipart/form-data">
                  @method('patch')
                    @csrf
                    <div class="form-group">
                                    <label>Nama Teams</label>
                                    <input type="text" name="name_teams" class="form-control" autofocus required value="{{ $teams->name_teams}}">
                                </div>

                                <div class="form-group">
                                    <label>Email Teams</label>
                                    <input type="text" name="email_teams" class="form-control" autofocus required value="{{ $teams->email_teams}}">
                                </div>

                                <div class="form-group">
                                    <label>Position Teams</label>
                                    <input type="text" name="position_teams" class="form-control" autofocus required value="{{ $teams->position_teams}}">
                                </div>

                                <div class="form-group">
                                    <label>Image Teams</label>
                                    <input type="file" name="image_teams" class="form-control" value="{{ $teams->image_teams}}">
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>

@stop
@section('content1')

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>   
            @endif

            <div class="row">
                <form action="{{ url('teams/' .$teams->id) }}" method="post">
                @method('patch')
                    <div class="form-group">
                                    <label>Nama Teams</label>
                                    <input type="text" name="name_teams" class="form-control" autofocus required>
                                </div>

                                <div class="form-group">
                                    <label>Email Teams</label>
                                    <input type="text" name="email_teams" class="form-control" autofocus required>
                                </div>

                                <div class="form-group">
                                    <label>Position Teams</label>
                                    <input type="text" name="position_teams" class="form-control" autofocus required>
                                </div>

                                <div class="form-group">
                                    <label>Image Teams</label>
                                    <input type="file" name="image_teams" class="form-control" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    {{-- <form>
                        <div class="form-group">
                          <label for="name_teams">Nama Teams</label>
                          <input type="text" class="form-control" id="name_teams" aria-describedby="emailHelp" placeholder="Nama Teams">
                          
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form> --}}
                      
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
@endsection       
