<div class="container">
    <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action="{{route('messages.update',$message->id)}}'" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="_method" value="PUT" />

				<div class="form-group">
        	<label for="title">Title</label>
        	<input type="text" name="title" value="{{ $message->title}}" class="form-control">
        	@error('title')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="body">Body</label>
        	<input type="text" name="body" value="{{ $message->body}}" class="form-control">
        	@error('body')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="sender">Sender</label>
        	<input type="text" name="sender" value="{{ $message->sender}}" class="form-control">
        	@error('sender')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
				<label for="users[]">User</label>
				<select  name="users[]"  class="form-control"  multiple>
			             
				@foreach($users as $user)
					<option value="{{ $user->id }}" @if($message->users->contains('id',$user->id)) selected @endif>{{ $user->name }}</option>
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