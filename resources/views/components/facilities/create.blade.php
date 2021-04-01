<div class="container">
    <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action="{{route('facilities.store')}}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
        	<label for="name">Name</label>
        	<input type="text" name="name" value="{{ old('name')}}" class="form-control">
        	@error('name')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="type">Type</label>
        	<input type="text" name="type" value="{{ old('type')}}" class="form-control">
        	@error('type')
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

				<div class="form-group">
					<label for="shoots[]">Shoot</label>
					<select  name="shoots[]"  class="form-control"  multiple>
				             
					@foreach($shoots as $shoot)
						<option value="{{ $shoot->id }}">{{ $shoot->name }}</option>
					@endforeach
					
				        </select>
					@error('shoots[]')
						<small >{{$message}}</small>
					@enderror
				</div>

				<div class="form-group">
					<label for="docs[]">Doc</label>
					<select  name="docs[]"  class="form-control"  multiple>
				             
					@foreach($docs as $doc)
						<option value="{{ $doc->id }}">{{ $doc->title }}</option>
					@endforeach
					
				        </select>
					@error('docs[]')
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

				<button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
</div>