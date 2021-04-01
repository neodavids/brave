@extends('layouts.app')
@section('content')
	<div class="container-fluid">
                    <h3 class="text-dark mb-4">Team</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Employee Info</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
							<table class="table my-0 dataTable " id="dataTable">
        							<thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Description</th>
                                            <th>facility</th>
											<th>Description</th>
											<th width="100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									</tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
@endsection
@push('{{ Route::currentRouteName() }}')
<script type="text/javascript">

$(function () {
  
  var table = $('.dataTable').DataTable({
	  processing: true,
	  serverSide: true,
	  ajax: "{{ route('bookings.index') }}",
	  columns: [
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		  {data: 'user', name: 'user'},
		  {data: 'date', name: 'date'},
		  {data: 'start_time', name: 'start_time'},
		  {data: 'end_time', name: 'end_time'},
		  {data: 'meeting_description', name: 'meeting_description'},
		  {data: 'facility', name: 'facility'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
	  ]
  });
  
});
</script>
@endpush

