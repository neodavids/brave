<div class="container">
    <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action="{{route('departments.store')}}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
        	<label for="name">Name</label>
        	<input type="text" name="name" value="{{ old('name')}}" class="form-control">
        	@error('name')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="head_of_department">Head_of_department</label>
        	<input type="text" name="head_of_department" value="{{ old('head_of_department')}}" class="form-control">
        	@error('head_of_department')
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

				<div class="form-group">
					<label for="issues[]">Issue</label>
					<select  name="issues[]"  class="form-control"  multiple>
				             
					@foreach($issues as $issue)
						<option value="{{ $issue->id }}">{{ $issue->item_name }}</option>
					@endforeach
					
				        </select>
					@error('issues[]')
						<small >{{$message}}</small>
					@enderror
				</div>

				<div class="form-group">
					<label for="shows[]">Show</label>
					<select  name="shows[]"  class="form-control"  multiple>
				             
					@foreach($shows as $show)
						<option value="{{ $show->id }}">{{ $show->user }}</option>
					@endforeach
					
				        </select>
					@error('shows[]')
						<small >{{$message}}</small>
					@enderror
				</div>

				<div class="form-group">
					<label for="messages[]">Message</label>
					<select  name="messages[]"  class="form-control"  multiple>
				             
					@foreach($messages as $message)
						<option value="{{ $message->id }}">{{ $message->title }}</option>
					@endforeach
					
				        </select>
					@error('messages[]')
						<small >{{$message}}</small>
					@enderror
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
</div>