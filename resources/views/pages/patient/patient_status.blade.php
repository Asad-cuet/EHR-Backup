<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="utf-8" />
            <title>Patient Status</title>  
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Dashboard - SB Admin</title>
            <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
            <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            @yield('css')
    
    
            <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
            <link href="{{asset('template/css/styles.css')}}" rel="stylesheet">
        </head>
<body>
      
<div class="container-fluid mt-3 px-4">

<div class="row">
      <div class="col">
      <ul class="list-group">
            <li class="list-group-item bg-info" aria-current="true">Patient Basic Information</li>
            <li class="list-group-item"><b>Name : </b>{{$consultation->patient->pre_name}} {{$consultation->patient->fname}} {{$consultation->patient->lname}} </li>
            <li class="list-group-item"><b>Gender : </b>{{$consultation->patient->gender}} </li>
            <li class="list-group-item"><b>Age : </b>{{$consultation->patient->age}} </li>
            <li class="list-group-item"><b>Height : </b>{{$consultation->patient->height}} Fit</li>
            <li class="list-group-item"><b>Wight : </b>{{$consultation->patient->weight}} Kg</li>
            <li class="list-group-item"><b>Phone : </b>{{$consultation->patient->phone}} </li>
            <li class="list-group-item"><b>Address : </b>{{$consultation->patient->address}} </li>
            <li class="list-group-item"><b>Guardian Phone : </b>{{$consultation->patient->guardian_phone}} </li>


            <br>
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
             <br>
            <li class="list-group-item bg-secondary text-white" aria-current="true">Consulting By</li>
            <li class="list-group-item"><b>Name : </b>{{$consultation->doctor->user->name}} </li>
            <li class="list-group-item"><b>Department : </b>{{$consultation->doctor->department->name}} </li>
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
                  <b>{{$item->test->test_name}} : </b>
                  @if(!empty($item->report))
                        <a href="{{asset('assets/report/'.$item->report)}}" class="badge btn btn-dark" target="_blank" rel="noopener noreferrer">View</a>  
                  @else
                       <div class="">Didn't Submitted Yet</div>
                  @endif
                  
                  
            </li>
      @endforeach

      <li class="list-group-item bg-success text-white" aria-current="true">Final Result</li>
      <li class="list-group-item">Normal </li>
</ul>

</div>
<br>
<br>
<br>
<script src="{{asset('bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('template/js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>



</body>
</html>