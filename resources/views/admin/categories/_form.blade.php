<div class="form-group">
   <p>You can creat a new category.</p>
   <label for=""><b>category name </b></label>
    <input type="text" class="form-control  @error('name') is-invalid @enderror " value="{{old('name',$category->name)}}" placeholder="Enter category" name="name">
  
    @error('name') 
    <p class="invalid-feedback">
    {{$message}}
    </p>  
    @enderror
     </div>
 <div class="form-group">
   <label for=""><b>Parent id</b></label>
    <select class="form-control" placeholder="Enter category"  name="parent_id">
      <option value ="">no parent</option>
      @foreach($parnets as $parnet)
      <option value="{{$parnet->id}}" @if($parnet->id == old('parent_id',$category->parent_id)) selected @endif >{{$parnet->name}}</option>
      @endforeach
    </select>
    </div>
  <div class="form-group">
    <button type ="submit" class=
    "btn btn-primary">{{$saveLabel}} </button>
     </div>
     