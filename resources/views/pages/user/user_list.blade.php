@extends('layout.lay')

@section('title','Doctors')
@section('content')



<table class="table">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Name</th>
       <th scope="col">Email</th>
       <th scope="col">Role As</th>
       <th scope="col">Action</th>
     </tr>
   </thead>
   <tbody>
      @foreach ($user as $item)
      <tr>
         <td>{{$item['id']}}</td>
         <td>{{$item['name']}}</td>
         <td>{{$item['email']}}</td>
         <td>{{$item['role_as']}}</td>
         <td>
            <a href="{{url('/delete-user/'.$item['id'])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
         </td>
         
       </tr>       
      @endforeach

   </tbody>
 </table>
@endsection