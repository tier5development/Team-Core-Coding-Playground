<div class="inner">
  <fieldset>
      <legend>{{(isset($edit) && $edit == '1') ? 'Update your ': 'Create a'}} post here</legend>
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title"  placeholder="Title" value="{{ isset ($post) ? $post->title : old('title') }}">
          {{-- Display errors --}}
          @if($errors->has('title'))
            <div class="alert alert-danger">
              {{$errors->first('title')}}
            </div>
          @endif
      </div>
      <div class="form-group">
        <label for="Deccription">Description</label>
        <textarea class="form-control" name="description" rows="6" placeholder="Write your post here" required> {{ isset($post) ? $post->description : old('description') }} </textarea>
        {{-- Display errors --}}
          @if($errors->has('description'))
            <div class="alert alert-danger">
              {{$errors->first('description')}}
            </div>
          @endif
      </div>
      <div>
        @if(@isset($edit) && $edit == '1')
          <input type="hidden" name="id" value="{{base64_encode($post->id)}}">        
        @else
        @endif
      </div>
      <div>
      	<label for="photo">Upload a photo for this post</label><br>
      	<input type="file" name="photo"  id="photo" class="form-control" >
      </div><br>
      <div><br>
      	<button type="submit" class="btn btn-success">{{(isset($edit) && $edit == '1') ? 'Update': 'Post'}}</button>
        @if(isset($edit) && $edit == '1')
          <a href="{{ URL::previous() }}"> <input type="button" class="btn btn-warning" value="Cancel"> </a>
        @endif
  	</div>
  </fieldset>
</div>