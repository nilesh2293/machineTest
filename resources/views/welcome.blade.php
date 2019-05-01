<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
    html, body {
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
    <div class="flex-center position-ref full-height">


        <div class="content">
           <form name="schedule" method="post" action="#">
             {{ csrf_field() }}
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Task ID</th>
                    <th>Task Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Duration</th>
                    <th>Dependency</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
            @foreach ($tasks as $key=>$task)
               <tr>
                   <td>{{$task->ID}}</td>
                   <td>{{$task->task_name}}</td>
                   
                   @if($key==0 && count($response)==0)
                   <td><input type="date" name="start_date"></td>
                   @elseif($key==0 && count($response)>0)
                   <td><input type="date" name="start_date" value="{{$response[$task->ID]['start_date']}}"></td>
                   @elseif(count($response)==0)
                   <td>?</td>
                   @else
                   <td>{{$response[$task->ID]['start_date']}}</td>
                   @endif

                   @if(count($response)==0)
                    <td>?</td>
                    @else
                   <td>{{$response[$task->ID]['end_date']}}</td>
                    @endif

                   <td>{{$task->duration}} days</td>
                   
                   @if(is_null($task->dependency))
                   <td>{{$task->dependency}}</td>
                   @else
                   <td>{{$task->dependency}} + {{$task->additional_days}} days</td>
                   @endif

                   <td>{{$task->description}}</td>
               </tr>
               @endforeach
               <input type="submit" name="schedule" value="schedule">
           </form> 
       </div>
   </div>
</body>
</html>
