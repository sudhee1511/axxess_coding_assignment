<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sign Up Page</title>

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
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
			<h3>Please enter the following details:</h3>

					<div class="container">
  						<form class ="" action="{{URL::to('/add_patient')}}" method="post">
   							<label for="fullname">Full Name</label>
    						<input type="text" id="fullname" name="fullname" placeholder="Enter Name" required="true">

    						<label for="email">Email</label>
    						<input type="text" id="email" name="email" placeholder="Enter Email" required="true">
							
							<label for="password">Password</label>
							<input type="password" name="password" value="" required="true"><br><br>
							
							<label for="birthday">Date Of Birth:</label>
							<select name="month" onChange="changeDate(this.options[selectedIndex].value);" required="true">
								<option value="">Month</option>
								<option value="01">January</option>
								<option value="02">February</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
							<select name="day" id="day" required="true">
								<option value="">Day</option>
							</select>
							<select name="year" id="year" required="true">
								<option value="">Year</option>
							</select>
							<script type="text/javascript">
								function changeDate(i){
									var e = document.getElementById('day');
									while(e.length>0)
									e.remove(e.length-1);
									var j=-1;
									if(i=="")
										k='';
									else if(i==2)
										k=28;
									else if(i==4||i==6||i==9||i==11)
										k=30;
									else
										k=31;
									while(j++<k){
										var s=document.createElement('option');
										var e=document.getElementById('day');
										if(j==0){
											s.text="Day";
											s.value="na";
											try{
												e.add(s,null);}
											catch(ex){
												e.add(s);}}
										else{
											s.text=j;
											s.value=j;
											try{
												e.add(s,null);}
											catch(ex){
												e.add(s);}}}}
										y = '<?php echo date('Y', strtotime('+1 year')) ?>';
									while (y-->1940){
										var s = document.createElement('option');
										var e = document.getElementById('year');
										s.text=y;
										s.value=y;
										try{
											e.add(s,null);}
										catch(ex){
											e.add(s);}} 
							</script>
							
							<input type="hidden" name="start_date_initial_contact" value="<?php echo date('Y-m-d'); ?>">
							<br><br><br><br>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
	  						<button type="submit" name="register" value="true">Sign up</button>
 						</form>
					</div>
            </div>
        </div>
    </body>
</html>
