@extends('layout.lay')

@section('title','Patients')
@section('content')


<table class="table">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Patient Name</th>
       <th scope="col">Patient Phone</th>
       <th scope="col">Consulting By</th>
       <th scope="col">Action</th>
     </tr>
   </thead>
   <tbody>
      @foreach ($consultations as $item)
      <tr>
         <td>{{$item['id']}}</td>
         <td>{{$item['patient_name']}}</td>
         <td>{{$item['patient_phone']}}</td>
         <td>{{$item['doctor_name']}}</td>
         <td>
            <a href="{{url('/consultation-status/'.$item['id'])}}" class="btn btn-info">Status</a>
            <a href="{{url('/history/'.$item['patient_id'])}}" class="btn btn-dark">History</a>
            <a href="{{url('/problem/'.$item['id'])}}" class="btn btn-danger">Problem</a>

            <a href="{{url('/prescribe/'.$item['id'])}}" class="btn btn-warning">Prescribe</a>
            <a href="{{url('/exam/'.$item['id'])}}" class="btn btn-primary">Exam</a>
         </td>
         
       </tr>       
      @endforeach

   </tbody>
 </table>
@endsection