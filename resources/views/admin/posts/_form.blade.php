<div class="form-group">
  
   <label for=""><b>title post </b></label>
    <input type="text"  name="title" class="form-control  @error('title') is-invalid @enderror " value="{{old('title', $post->title) }}" placeholder="Enter category">
  
    @error('title') 
    <p class="invalid-feedback">
    {{$message}}
    </p>  
    @enderror
     </div>
 <div class="form-group">
   <label for=""><b>Category</b></label>
    <select class="form-control" placeholder="Enter category"  name="category_id">
      <option value ="">no category</option>
      @foreach($categories as $category)
      <option value="{{$category->id}}" @if($category->id == old('category_id',$post->category_id)) selected @endif >{{$category->name}}</option>
      @endforeach
    </select>
    </div>

    <div class="form-group">
   
   <label for=""> Content</label>
    <textarea rows="10" class="form-control  @error('content') is-invalid @enderror "  placeholder="Enter category" name="content">{{old('content', $post->content)}}</textarea>
  
    @error('content') 
    <p class="invalid-feedback">
    {{$message}}
    </p>  
    @enderror
     </div> 
     

     <div class="form-group">
   
   <label for=""><b>Image </b></label>
    <input type="file" class="form-control  @error('image') is-invalid @enderror "  placeholder="" name="image">
  
    @error('image') 
    <p class="invalid-feedback">
    {{$message}}
    </p>  
    @enderror
     </div>

     <div class="form-class">
     <label for="">Status</label>
     <div>
     <div class="form-check">
  <input class="form-check-input" type="radio" name="status"  value="draft">
  <label class="form-check-label" for="exampleRadios1">
   Draft
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="status"  value="published">
  <label class="form-check-label" for="exampleRadios2">
    Published
  </label>
</div>
  </div>
     <div>

  <div class="form-group">
    <button type ="submit" class=
    "btn btn-primary">{{$saveLabel}} </button>
     </div>
     