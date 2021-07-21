@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
          <div class="container-fixed">
            <div class="row">
              <div class="col-md-12">
                <div class="panel-body">
                  <form action="{{ url('services/' .$services->id) }}" method="post">
                    @method('patch')
                    @csrf
                        <div class="form-group">
                            <label>Title services</label>
                            <input type="text" name="title_services" class="form-control" value="{{ $services->title_services}}" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Services</label>
                            <textarea type="text" name="desc_services" class="form-control" cols="30" rows="10" autofocus required>{{ $services->desc_services}}</textarea>
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
                <form action="{{ url('services/' .$services->id) }}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                        <div class="form-group">
                            <label>Title Services</label>
                            <input type="text" name="title_services" class="form-control" value="{{ $services->title_services}}" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Services</label>
                            <textarea name="desc_services" class="form-control" cols="30" rows="10" value="{{ $services->desc_services}}"></textarea> 
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
                          <label for="title_techs">Title Services</label>
                          <input type="text" class="form-control" id="title_services" aria-describedby="emailHelp" placeholder="Title Services">
                          
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