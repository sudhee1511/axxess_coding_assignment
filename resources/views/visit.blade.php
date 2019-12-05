<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Visit Page</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			
			
input[type=text], {
  width: 30%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
			
            <div class="content">
			<h3>Add a visit page</h3>
			@if (session('alert'))
    		<div class="alert alert-success">
        		{{ session('alert') }}
    		</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
			@endif
					<div class="container">
  						<form class ="" action="{{URL::to('/add_visit_patient')}}" method="post">
   							
							
							{{--<label for="pids">Patient ID</label>--}}
    						{{--<input type="text" id="pids" name="pid" placeholder="Enter patient id" required="true">--}}

                            <label for="pid">Patient Name</label>
                            <select name="pid" id="pid">
                                <option>Select Patient</option>
                                @foreach(\App\User::all() as $user)
                                    <option value="{{$user->id}}"> {{ $user->name }}</option>
                                @endforeach
                            </select>
							<label for="visit_date">Visit Date</label>
							<input type="date" name="visit_date" value="" required="true"><br><br>
							
							<input type="hidden" name="_token" value="{{csrf_token()}}">
	  						
							<button type="submit" name="add_visit" value="true">Add a visit</button>
 						</form>
					</div>
            </div>
        </div>
    </body>
</html>
