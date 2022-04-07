
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>FormDen Example</title>
</head>
<body>

<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    @if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif
    @if(Session::has('error'))
    <div class="alert alert-error">
        {{ Session::get('error') }}
        @php
            Session::forget('error');
        @endphp
    </div>
    @endif
    <form action="{{ url('/saveEvent') }}" class="form-horizontal" method="post">
        @csrf
     <div class="form-group ">
      <label class="control-label col-sm-2 requiredField" for="title">
        Event Title:
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
       <div class="input-group">
        <input class="form-control" id="title" name="title" placeholder="Title" type="text"/>
       </div>
      </div>
     </div>
     <div class="form-group ">
        <label class="control-label col-sm-2 requiredField" for="startDate">
         Start Date
         <span class="asteriskField">
          *
         </span>
        </label>
        <div class="col-sm-10">
         <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar">
                </i>
               </div>
          <input class="form-control" id="startDate" name="startDate" placeholder="YYYY-MM-DD" type="text"/>
         </div>
        </div>
       </div>
       <div class="form-group ">
        <label class="control-label col-sm-2 requiredField" for="endDate">
         End Date
         <span class="asteriskField">
          *
         </span>
        </label>
        <div class="col-sm-10">
         <div class="input-group">
          <div class="input-group-addon">
           <i class="fa fa-calendar">
           </i>
          </div>
          <input class="form-control" id="endDate" name="endDate" placeholder="YYYY-MM-DD" type="text"/>
         </div>
        </div>
       </div>
       <div class="form-group ">
        <label class="control-label col-sm-2 requiredField" for="Recurrence">
         Recurrence
         <span class="asteriskField">
          *
         </span>
        </label>
        <div class="col-sm-10">
         <div class="input-group">
            <input id="repeatType" checked name="repeatType" tabindex="9" type="radio" value="1" /><label
                        for="repeatType"><span style="font-size: 10pt; font-family: Verdana">Repeat</span></label>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <select id="gap" class="textbox-medium"
                name="gap" style="font-size: x-small; width: 100px; font-family: Verdana"
                tabindex="10">
                <option selected="selected" value="1">Every</option>
                <option value="2">Every Other</option>
                <option value="3">Every Third</option>
                <option value="4">Every Fourth</option>
            </select>
            <select id="type" class="textbox-medium" name="type" style="font-size: x-small;
                width: 66px; font-family: Verdana" tabindex="10">
                <option selected="selected" value="day">Day</option>
                <option value="week">Week</option>
                <option value="month">Month</option>
                <option value="year">Year</option>
            </select>
         </div>
        </div>
       </div>
       <div class="form-group ">
  
        </label>
        <div class="col-sm-10">
         <div class="input-group">
            <input id="repeatType" tabIndex=11 type=radio value="2" 
            name="repeatType" /><span style="font-size: 10pt; font-family: Verdana">Repeat on the
            <select id="gap2" class="textbox-middle" name="gap2" style="font-size: x-small;
                width: 68px; font-family: Verdana" tabindex="12">
                <option selected="selected" value="1">First</option>
                <option value="2">Second</option>
                <option value="3">Third</option>
                <option value="4">Fourth</option>
            </select>
            </span>&nbsp;
            <select id="day" class="textbox-middle" name="day"
                style="font-size: x-small; width: 56px; font-family: Verdana" tabindex="13">
                <option selected="selected" value="sun">Sun</option>
                <option value="mon">Mon</option>
                <option value="tue">Tue</option>
                <option value="wed">Wed</option>
                <option value="thu">Thu</option>
                <option value="fri">Fri</option>
                <option value="sat">Sat</option>
            </select>
            of the
            <select id="type2" class="textbox-middle" language="javascript" name="type2"
                style="font-size: x-small; width: 80px;
                font-family: Verdana" tabindex="14">
                <option selected="selected" value="month">Month</option>
                <option value="3month">3 Months</option>
                <option value="4month">4 Months</option>
                <option value="6month">6 Months</option>
                <option value="year">Year</option>
            </select>
         </div>
        </div>
       </div>
     <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="startDate"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
        var date_input=$('input[name="endDate"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>

</body>

</html>