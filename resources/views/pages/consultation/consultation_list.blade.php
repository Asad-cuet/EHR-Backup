@extends('layout.lay')

@section('title','Patients')
@section('content')

@if($con_quantity_on_lab>0)
<div class="alert alert-info">
  Your <strong>{{$con_quantity_on_lab}}</strong> patient is on Laboratory
</div>
@else
<div class="alert alert-info">
No patient of your is on Laboratory
</div> 
@endif

<table class="table">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Patient Name</th>
       <th scope="col">Patient Phone</th>
       <th scope="col">Is New</th>
       <th scope="col">Action</th>
     </tr>
   </thead>
   <tbody>
      @foreach ($consultations as $item)
      <tr>
         <td>{{$item['id']}}</td>
         <td>{{$item['patient_name']}}</td>
         <td>{{$item['patient_phone']}}</td>
         <td>
            @if($item['is_examed']==1)
            <div class="badge bg-danger">Old</div>   
            @else
            <div class="badge bg-primary">New</div>   
            @endif
        </td>
         <td>
            <a href="{{url('/consultation-status/'.$item['id'])}}" class="btn btn-info">Status</a>
            <a href="{{url('/history/'.$item['patient_id'])}}" class="btn btn-dark">History</a>
            <a href="{{url('/problem/'.$item['id'])}}" class="btn btn-danger">Problem</a>

            <a href="{{url('/prescribe/'.$item['id'])}}" class="btn btn-warning">Prescribe</a>
            <a href="{{url('/exam/'.$item['id'])}}" class="btn btn-primary">Exam</a>
            <a href="{{url('/exam-result/'.$item['id'])}}" class="btn btn-success">Final Statement</a>
            <a href="{{url('/consultant-complete/'.$item['id'])}}" 
            onclick="return confirm('After this action You will be unable to take other actions to this patient')" 
            class="btn btn-outline-secondary">Complete</a>
         </td>
         
       </tr>       
      @endforeach

   </tbody>
 </table>
@endsection