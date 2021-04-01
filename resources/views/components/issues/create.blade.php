<div class="container">
    <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action="{{route('issues.store')}}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
        	<label for="item_name">Item_name</label>
        	<input type="text" name="item_name" value="{{ old('item_name')}}" class="form-control">
        	@error('item_name')
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
        	<label for="date">Date</label>
        	<input type="date" name="date" value="{{ old('date')}}" class="form-control">
        	@error('date')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="location">Location</label>
        	<input type="text" name="location" value="{{ old('location')}}" class="form-control">
        	@error('location')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="raised_by">Raised_by</label>
        	<input type="text" name="raised_by" value="{{ old('raised_by')}}" class="form-control">
        	@error('raised_by')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="department">Department</label>
        	<input type="text" name="department" value="{{ old('department')}}" class="form-control">
        	@error('department')
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
        	<label for="solved_by">Solved_by</label>
        	<input type="text" name="solved_by" value="{{ old('solved_by')}}" class="form-control">
        	@error('solved_by')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="action_taken">Action_taken</label>
        	<input type="text" name="action_taken" value="{{ old('action_taken')}}" class="form-control">
        	@error('action_taken')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="cause_of_breakdown">Cause_of_breakdown</label>
        	<input type="text" name="cause_of_breakdown" value="{{ old('cause_of_breakdown')}}" class="form-control">
        	@error('cause_of_breakdown')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="engineers_comment">Engineers_comment</label>
        	<input type="text" name="engineers_comment" value="{{ old('engineers_comment')}}" class="form-control">
        	@error('engineers_comment')
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