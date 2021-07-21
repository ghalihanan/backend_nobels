<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <body>

        <div class="container">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>   
            @endif

            <div class="row">
                <div class="col-6">
                    <h1> Data Company</h1>
                </div>

                <div class="col-6">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data Company
                      </button>
                      
                      
                </div>
                <table class="table table-hover">
                    <thead>
                        <th>No.</th>
                        <th>Nama Company</th>
                        <th>Deskripsi</th>
                        <th>Images</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($company as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name_company}}</td>
                                <td>{{ $item->desc_company}}</td>
                                <td>{{ $item->image_company}}</td>
                                <td class="text-center">
                                    <a href="{{ url('company/edit/' .$item->id) }}" class="btn btn-warning btn-sm" role="button">
                                        Edit
                                    </a>

                                    <form action="{{ url('company/' .$item->id) }}" method="post" id="delete"  class="d-inline" onsubmit="return confirm('Are You Usere Delete Data?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                        @endforeach
                    </tbody>
                </table>
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
                          <label for="name_company">Nama Company</label>
                          <input type="text" class="form-control" id="name_company" aria-describedby="emailHelp" placeholder="Nama Company">
                          
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
                      <form action="{{ url('company') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label>Nama Company</label>
                                <input type="text" name="name_company" class="form-control" autofocus required>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Company</label>
                                <textarea type="text" name="desc_company" class="form-control" cols="30" rows="10"></textarea>
                        
                            </div>
    
                            <div class="form-group">
                                <label>Image Company</label>
                                <input type="file" name="image_company" class="form-control" required>
                            </div>

                              <button type="submit" class="btn btn-primary">Submit</button>
    
                        </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
    </body>
</html>