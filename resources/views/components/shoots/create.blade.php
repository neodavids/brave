<div class="container">
    <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action="{{route('shoots.store')}}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
        	<label for="name">Name</label>
        	<input type="text" name="name" value="{{ old('name')}}" class="form-control">
        	@error('name')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="start_date">Start_date</label>
        	<input type="date" name="start_date" value="{{ old('start_date')}}" class="form-control">
        	@error('start_date')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="end_date">End_date</label>
        	<input type="date" name="end_date" value="{{ old('end_date')}}" class="form-control">
        	@error('end_date')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="status">Status</label>
        	<input type="text" name="status" value="{{ old('status')}}" class="form-control">
        	@error('status')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="producer_1">Producer_1</label>
        	<input type="text" name="producer_1" value="{{ old('producer_1')}}" class="form-control">
        	@error('producer_1')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="producer_2">Producer_2</label>
        	<input type="text" name="producer_2" value="{{ old('producer_2')}}" class="form-control">
        	@error('producer_2')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="producer_3">Producer_3</label>
        	<input type="text" name="producer_3" value="{{ old('producer_3')}}" class="form-control">
        	@error('producer_3')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="producer_4">Producer_4</label>
        	<input type="text" name="producer_4" value="{{ old('producer_4')}}" class="form-control">
        	@error('producer_4')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="description">Description</label>
        	<input type="text" name="description" value="{{ old('description')}}" class="form-control">
        	@error('description')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
					<label for="users[]">User</label>
					<select  name="users[]"  class="form-control"  multiple>
				             
					@foreach($users as $user)
						<option value="{{ $user->id }}">{{ $user->name }}</option>
					@endforeach
					
				        </select>
					@error('users[]')
						<small >{{$message}}</small>
					@enderror
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
</div>