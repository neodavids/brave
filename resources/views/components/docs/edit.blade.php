<div class="container">
    <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action="{{route('docs.update',$doc->id)}}'" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="_method" value="PUT" />

				<div class="form-group">
        	<label for="title">Title</label>
        	<input type="text" name="title" value="{{ $doc->title}}" class="form-control">
        	@error('title')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="download_link">Download_link</label>
        	<input type="text" name="download_link" value="{{ $doc->download_link}}" class="form-control">
        	@error('download_link')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="last_updated">Last_updated</label>
        	<input type="datetime-local" name="last_updated" value="{{ $doc->last_updated}}" class="form-control">
        	@error('last_updated')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
				<label for="users[]">User</label>
				<select  name="users[]"  class="form-control"  multiple>
			             
				@foreach($users as $user)
					<option value="{{ $user->id }}" @if($doc->users->contains('id',$user->id)) selected @endif>{{ $user->name }}</option>
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