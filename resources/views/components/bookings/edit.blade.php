<div class="container">
    <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action="{{route('bookings.update',$booking->id)}}'" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="_method" value="PUT" />

				<div class="form-group">
        	<label for="user">User</label>
        	<input type="text" name="user" value="{{ $booking->user}}" class="form-control">
        	@error('user')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="date">Date</label>
        	<input type="date" name="date" value="{{ $booking->date}}" class="form-control">
        	@error('date')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="start_time">Start_time</label>
        	<input type="time" name="start_time" value="{{ $booking->start_time}}" class="form-control">
        	@error('start_time')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="end_time">End_time</label>
        	<input type="text" name="end_time" value="{{ $booking->end_time}}" class="form-control">
        	@error('end_time')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="meeting_description">Meeting_description</label>
        	<input type="text" name="meeting_description" value="{{ $booking->meeting_description}}" class="form-control">
        	@error('meeting_description')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="facility">Facility</label>
        	<input type="text" name="facility" value="{{ $booking->facility}}" class="form-control">
        	@error('facility')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
				<label for="users[]">User</label>
				<select  name="users[]"  class="form-control"  multiple>
			             
				@foreach($users as $user)
					<option value="{{ $user->id }}" @if($booking->users->contains('id',$user->id)) selected @endif>{{ $user->name }}</option>
				@endforeach
				
			        </select>
				@error('users[]')
					<small >{{$message}}</small>
				@enderror
			</div>

				<div class="form-group">
				<label for="facilities[]">Facility</label>
				<select  name="facilities[]"  class="form-control"  multiple>
			             
				@foreach($facilities as $facility)
					<option value="{{ $facility->id }}" @if($booking->facilities->contains('id',$facility->id)) selected @endif>{{ $facility->name }}</option>
				@endforeach
				
			        </select>
				@error('facilities[]')
					<small >{{$message}}</small>
				@enderror
			</div>

				<button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
</div>