<x-admin-layout title="Create">
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $message)
<li>{{$message}}</li>
@endforeach
</ul>

</div>
@endif

<form action="/admin/posts" method="post">
@csrf
@include('admin.posts._form',[
'saveLabel'=>'add a new'])
 
</form>


</x-admin-layout>
