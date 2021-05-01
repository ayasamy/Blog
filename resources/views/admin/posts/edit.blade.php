<x-admin-layout title="Edit Post">


<form action="/admin/posts/{{$post->id}}" method="post">
@csrf
@method('put')
@include('admin.posts._form',[
'saveLabel'=>'Update'])
 
</form>


</x-admin-layout>
