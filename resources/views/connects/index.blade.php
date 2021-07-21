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
					<h3 class="panel-title">Feedbacks</h3>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No.</th>
                <th>Username</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
							</tr>
						</thead>
						<tbody>
              @foreach ($connects as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->user_name}}</td>
                <td>{{ $item->user_email}}</td>
                <td>{{ $item->message}}</td>
                <td>
                  <a href="{{url('connects/detail/' .$item->id)}}" class="btn btn-warning btn-sm">Detail</a>
                </td>
              </tr>
              @endforeach
						</tbody>
					</table>
          <nav aria-label="Page navigation example">
            {{ $connects->links() }}
          </nav>
				</div>
			</div>
    </div>
  </div>
</div>
</div>
</div>
@stop