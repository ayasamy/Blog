<x-admin-layout title="Categories aya">
            <div class="mb-4">
              <a href="/admin/categories/create" class="btn btn-sm btn-outline-primary">You can create a new category</a>
            </div>
            @if(session()->has('success'))
            <div class="alert alert-success">
            {{session()->get('success')}}
            </div>
            @endif
  <table class="table">
   <thead>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Slug</th>
    <th>Parent</th>
    <th>Created at</th>
    <th></th>
    <th></th>
    
  </tr>
  </thead>
  <tbody>
  @foreach ($categories as $category):
  <tr>
<td> {{$category->id}}</td>
<td>  {{$category->name}}</td>
<td> {{$category->slug}}</td>
 <td>  {{$category->parent_id}}</td>
<td>  {{$category->created_at}}</td>
<td><a href="/admin/categories/{{$category->id}}" class="btn btn-sm btn-outline-success">Edit</a></td>
<td><form action="/admin/categories/{{$category->id}}" method="post">
@csrf
@method('delete')
<button type="submit"  class="btn btn-sm btn-outline-danger"> Delete</button>
</form></td>
  </tr>
@endforeach
  </tbody>
</table> 

</x-admin-layout>
               