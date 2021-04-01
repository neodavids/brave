<div class="container">
    <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action="{{route('roles.update',$role->slug)}}'" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="_method" value="PUT" />

				<div class="form-group">
        	<label for="name">Name</label>
        	<input type="text" name="name" value="{{ $role->name}}" class="form-control">
        	@error('name')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
				<label for="users[]">User</label>
				<select  name="users[]"  class="form-control"  multiple>
			             
				@foreach($users as $user)
					<option value="{{ $user->id }}" @if($role->users->contains('id',$user->id)) selected @endif>{{ $user->name }}</option>
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