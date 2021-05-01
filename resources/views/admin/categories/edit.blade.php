<x-admin-layout title="Edit Category">


<form action="/admin/categories/{{$category->id}}" method="post">
@csrf
@method('put')
@include('admin.categories._form',[
'saveLabel'=>'Update'])
 
</form>


</x-admin-layout>
