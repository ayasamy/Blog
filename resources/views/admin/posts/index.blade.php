<x-admin-layout title="Posts">
            <div class="mb-4">
              <a href="/admin/posts/create" class="btn btn-sm btn-outline-primary">You can create a new category</a>
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
    <th>Title</th>
    <th>Slug</th>
    <th>Category</th>
    <th>User</th>
    <th>Status</th>
    <th>Created at</th>
    <th></th>
    <th></th>
    
  </tr>
  </thead>
  <tbody>
  @forelse($posts as $post)
  <tr>
<td>{{$post->id}}</td>
<td>{{$post->title}}</td>
<td>{{$post->slug}}</td>
<td>{{$post->category_id}}</td>
<td>{{$post->status}}</td>
<td>{{$post->user_id}}</td>
<td>{{$post->created_at}}</td>
<td><a href="/admin/posts/{{$post->id}}" class="btn btn-sm btn-outline-success">Edit</a></td>
<td><form action="/admin/posts/{{$post->id}}" method="post">
@csrf
@method('delete')
<button type="submit"  class="btn btn-sm btn-outline-danger"> Delete</button>
</form>
</td>
  </tr>
  @empty
  <tr>
  <td colspan= "9 ">no posts found</td>
  </tr>
@endforelse
  </tbody>
</table> 

</x-admin-layout>
               