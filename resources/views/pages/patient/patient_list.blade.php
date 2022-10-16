@extends('layout.lay')

@section('title','Patients')
@section('content')


<table class="table">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Name</th>
       <th scope="col">Gender</th>
       <th scope="col">Age</th>
       <th scope="col">Weight</th>
       <th scope="col">Phone</th>
       <th scope="col">Status</th>
       <th scope="col">Action</th>
     </tr>
   </thead>
   <tbody>
      @foreach ($patients as $item)
      <tr>
         <td>{{$item['id']}}</td>
         <td>{{$item['pre_name']}} {{$item['fname']}} {{$item['lname']}}</td>
         <td>{{$item['gender']}}</td>
         <td>{{$item['age']}}</td>
         <td>{{$item['weight']}}</td>
         <td>{{$item['phone']}}</td>
         <td>
          @if($item['is_cleared'])
          <div class="badge  bg-success">Consultation Completed</div>
          @else
              @if(!$item['is_consulted'])
                  <div class="badge  bg-danger">Not Consulted</div>    
              @else
                  <div class="badge  bg-dark">Consulted</div>    
              @endif
          @endif
        </td>
         <td>
            <a href="{{url('/patient-view/'.$item['id'])}}" class="btn btn-secondary">View</a>
            @if(!$item['is_consulted'])
            <a href="{{url('/consultant/'.$item['id'])}}" class="btn btn-primary">Consultant To</a>
            @endif
         </td>
         
       </tr>       
      @endforeach

   </tbody>
 </table>
@endsection