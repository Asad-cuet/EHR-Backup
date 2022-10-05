@extends('layout.lay')

@section('title','Patients')
@section('content')
@if(session()->has('status'))
      <div class="alert alert-success" role="alert">
            {{session('status')}}   
      </div>                
@endif

<div class="row">
      <div class="col">
      <ul class="list-group">
            <li class="list-group-item bg-info" aria-current="true">Patient Basic Information</li>
            <li class="list-group-item"><b>Name : </b>{{$consultation->patient->name}} </li>
            <li class="list-group-item"><b>Gender : </b>{{$consultation->patient->gender}} </li>
            <li class="list-group-item"><b>Age : </b>{{$consultation->patient->age}} </li>
            <li class="list-group-item"><b>Height : </b>{{$consultation->patient->height}} Fit</li>
            <li class="list-group-item"><b>Wight : </b>{{$consultation->patient->weight}} Kg</li>
            <li class="list-group-item"><b>Phone : </b>{{$consultation->patient->phone}} </li>
            <li class="list-group-item"><b>Address : </b>{{$consultation->patient->address}} </li>
            <li class="list-group-item"><b>Guardian Phone : </b>{{$consultation->patient->guardian_phone}} </li>

            <li class="list-group-item bg-secondary text-white" aria-current="true">Consulting By</li>
            <li class="list-group-item"><b>Name : </b>{{$consultation->doctor->name}} </li>
            <li class="list-group-item"><b>Subject : </b>{{$consultation->doctor->subject}} </li>
      </ul>
      </div>
      <div class="col">
            <ul class="list-group">

                  <li class="list-group-item bg-dark text-white" aria-current="true">History</li>
                  <li class="list-group-item"><b>Primary Admitting Diagnosis : </b>{{$history->primary_admitting_diagnosis}} </li>
                  <li class="list-group-item"><b>Permanant history : </b>{{$history->permanant_history}} </li>
                  <li class="list-group-item"><b>Previous Medical History : </b>{{$history->previous_medical_history}} </li>
                  <li class="list-group-item"><b>Surgical History : </b>{{$history->surgical_history}} </li>
                  <li class="list-group-item"><b>Smoker : </b>{{$history->smoker}} </li>
                  <li class="list-group-item"><b>Diabetes : </b>{{$history->diabetes}} </li>
                  <li class="list-group-item"><b>Heart Rate : </b>{{$history->heart_rate}} </li>
                  <li class="list-group-item"><b>BP Systole : </b>{{$history->bp_systole}} </li>
                  <li class="list-group-item"><b>BP Diastole : </b>{{$history->bp_diastole}} </li>
                  <li class="list-group-item"><b>Oxygen Seturation : </b>{{$history->oxygen_seturation}} </li>
                  <li class="list-group-item"><b>Pain On Scale : </b>{{$history->pain_on_scale}} </li>
            </ul>
      </div>
</div>

<br>
<ul class="list-group">

      <li class="list-group-item bg-danger text-white" aria-current="true">Problem</li>
      <li class="list-group-item"><b>Details : </b>{{$consultation->problem_details}} </li>
      <li class="list-group-item"><b>Duration : </b>{{$consultation->problem_duration}} </li>

      <li class="list-group-item bg-warning text-white" aria-current="true">Doctor's Prescription</li>
      @foreach ($consultation->prescribe as $item)
      <li class="list-group-item"><b>{{$item['title']}} : </b> {{$item['comment']}}</li>
      @endforeach
      


      <li class="list-group-item active" aria-current="true">Given Test</li>
      @foreach ($test as $item)
            <li class="list-group-item">
                  <b>{{$item->test->test_name}} : </b> Image  
            </li>
      @endforeach

      <li class="list-group-item bg-success text-white" aria-current="true">Final Result</li>
      <li class="list-group-item">Normal </li>
</ul>
@endsection