@extends('layouts.master')

@section('content')
  <div class="main">
    <div class="main-content">
      <div class="container-fixed">

        @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>   
            @endif

        <div class="row">
          <div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Services</h3>
                  <div class="class right">
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Tambah Data Services
                    </button> --}}
                    <button style= "width:75px; height:35px; color:green" type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                      <i class="fa fa-plus-square"></i> Add </button>
                  </div>
								</div>
								<div class="panel-body table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No.</th>
                        <th>Title</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
											</tr>
										</thead>
										<tbody>
                    @foreach ($services->sortBy('id') as $item)
                      <tr>
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->title_services}}</td>
                          <td>{{ $item->desc_services}}</td>
                          <td>
                              <a href="{{url('services/edit/' .$item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                              <a href="{{url('services/delete/' .$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                          </td>
                      </tr>
                    @endforeach

										</tbody>
									</table>

                  <nav aria-label="Page navigation example">
                      {{ $services->links() }}
                  </nav>
								</div>
							</div>

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Services</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ url('services') }}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label>Title Services</label>
                                    <input type="text" name="title_services" class="form-control" autofocus required>
                                </div>
        
                                <div class="form-group">
                                    <label>Deskripsi Services</label>

                                    <input type="text" name="desc_services" class="form-control" cols="30" rows="10" autofocus required></textarea>
                                    
                                </div>
    
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        
                            </form>
                    </div>
                    {{-- <div class="modal-footer">
                      
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
                  </div>
                </div>
            </div>

           
							<!-- END TABLE HOVER -->
						
          </div>
        </div>
      </div>
    </div>
    <!-- <form action="upload" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="gambar">
    <Br>
    <button type="submit">Upload File</button> -->
  </div>
  
@stop