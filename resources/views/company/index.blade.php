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
									<h3 class="panel-title">Data Company</h3>
                  <div class="class right">
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Tambah Data Company
                    </button> --}}
                    <button style= "width:75px; height:35px; color:green" type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                      <i class="fa fa-plus-square"></i> Add </button>
                  </div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No.</th>
                        <th>Nama Company</th>
                        <th>Deskripsi</th>
                        <th>Images</th>
                        <th>Action</th>
											</tr>
										</thead>
										<tbody>
                    @foreach ($company->sortBy('id') as $item)
                      <tr>
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->name_company}}</td>
                          <td>{{ $item->desc_company}}</td>
                          <td><img style="width:200px" src="{{url('/images/'.$item->image_company)}}" alt=""> </td>
                          <td>
                              <a href="{{url('company/edit/' .$item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                              <a href="{{url('company/delete/' .$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                          </td>
                      </tr>
                    @endforeach

										</tbody>
									</table>

                  <nav aria-label="Page navigation example">
                      {{ $company->links() }}
                  </nav>
								</div>
							</div>

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Company</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ url('company') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label>Nama Company</label>
                                    <input type="text" name="name_company" class="form-control" autofocus required>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi Company</label>
                                    
                                    <textarea type="text" name="desc_company" class="form-control" cols="30" rows="10" autofocus required></textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Image company</label>
                                    <input type="file" name="image_company" class="form-control" required>
                                    
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
  </div>
  
@stop