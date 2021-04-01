<div class="container">
    <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action="{{route('shows.update',$show->id)}}'" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="_method" value="PUT" />

				<div class="form-group">
        	<label for="user">User</label>
        	<input type="text" name="user" value="{{ $show->user}}" class="form-control">
        	@error('user')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="date">Date</label>
        	<input type="date" name="date" value="{{ $show->date}}" class="form-control">
        	@error('date')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="show_description">Show_description</label>
        	<input type="text" name="show_description" value="{{ $show->show_description}}" class="form-control">
        	@error('show_description')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="studio">Studio</label>
        	<input type="text" name="studio" value="{{ $show->studio}}" class="form-control">
        	@error('studio')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="start_time">Start_time</label>
        	<input type="time" name="start_time" value="{{ $show->start_time}}" class="form-control">
        	@error('start_time')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="end_time">End_time</label>
        	<input type="time" name="end_time" value="{{ $show->end_time}}" class="form-control">
        	@error('end_time')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
				<label for="users[]">User</label>
				<select  name="users[]"  class="form-control"  multiple>
			             
				@foreach($users as $user)
					<option value="{{ $user->id }}" @if($show->users->contains('id',$user->id)) selected @endif>{{ $user->name }}</option>
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