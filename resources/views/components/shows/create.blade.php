<div class="container">
    <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action="{{route('shows.store')}}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
        	<label for="user">User</label>
        	<input type="text" name="user" value="{{ old('user')}}" class="form-control">
        	@error('user')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="date">Date</label>
        	<input type="date" name="date" value="{{ old('date')}}" class="form-control">
        	@error('date')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="show_description">Show_description</label>
        	<input type="text" name="show_description" value="{{ old('show_description')}}" class="form-control">
        	@error('show_description')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="studio">Studio</label>
        	<input type="text" name="studio" value="{{ old('studio')}}" class="form-control">
        	@error('studio')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="start_time">Start_time</label>
        	<input type="time" name="start_time" value="{{ old('start_time')}}" class="form-control">
        	@error('start_time')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="end_time">End_time</label>
        	<input type="time" name="end_time" value="{{ old('end_time')}}" class="form-control">
        	@error('end_time')
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