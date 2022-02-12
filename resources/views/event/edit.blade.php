<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

</head>

<body class="antialiased">
    <form name="eventFrm" id="eventFrm" action="{{route('event/store')}}" method="POST">
        <input type="hidden" name="event_id" value="{{$data->id}}">
        @csrf()
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="email" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter Title" value="{{$data->title}}">

        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Start date</label>
            <div class='input-group date' id='datetimepicker6'>
                <input type='text' class="form-control" name="start_date" value="{{$data->start_date}}"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">End date</label>
                <div class='input-group date' id='datetimepicker7'>
                    <input type='text' name="end_date" class="form-control" value="{{$data->end_date}}" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="recurrence_on" value="1" class="custom-control-input" checked="{{($data->recurrence_id == 1)? 'checked':false}}">
                <label class="custom-control-label" for="customRadio1">Rucrrence on</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="recurrence_on" value="2" class="custom-control-input" checked="{{($data->recurrence_id == 2)? 'checked':false}}">
                <label class="custom-control-label" for="customRadio2">Rucurrence on the</label>
            </div>

            <div class="row" id="option1" style="display: none;">
                <div class="col-6">
                    <select class="custom-select form-control" name="repeat_on">
                        <option selected>Open this select every</option>
                        
                        <option value="Every Other">Every Other</option>
                        <option value="Every Third">Every Third</option>
                        <option value="Every Fourth">Every Fourth</option>
                    </select>
                </div>
                <div class="col-6">
                    <select class="custom-select form-control" name="skip_day">
                        <option selected>Open this select day</option>
                        <option value="week">week</option>
                        <option value="month">month</option>
                        <option value="year">year</option>
                    </select>
                </div>

            </div>

            <div class="row" id="option2" style="display: none;">
                <div class="col-6">
                    <select class="custom-select form-control" name="repeat_index">
                        <option selected>Open this select every</option>
                        
                        <option value="first">First</option>
                        <option value="second">Second</option>
                        <option value="third">Third</option>
                        <option value="fourth">Fourth</option>
                    </select>
                </div>
                <div class="col-6">
                    <select class="custom-select form-control" name="repeat_day">
                        <option selected>Open this select day</option>
                        <option value="sunday">Sunday</option>
                        <option value="monday">monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wednesday">wednesday</option>
                        <option value="thusday">Thusday</option>
                        <option value="friday">Friday</option>
                        <option value="saturday">Saturday</option>
                        
                    </select>
                </div>
                <div class="col-6">
                    <select class="custom-select form-control" name="repeat_criteria">
                        <option selected>Open this select month</option>
                        <option value="3 months">3 Months</option>
                        <option value="4 months">4 Months</option>
                        <option value="9 months">9 Months</option>
                    </select>
                </div>

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            {!! JsValidator::formRequest('App\Http\Requests\CreateEventRequest') !!}
    </form>
</body>

<script type="text/javascript">
    $(function() {
        $('#datetimepicker6').datetimepicker({
            format: 'd-mm-YYYY'
        });
        $('#datetimepicker7').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            format: 'd-mm-YYYY'
        });
        $("#datetimepicker6").on("dp.change", function(e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function(e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });

    $("input[name='recurrence_on']").change(function() {
       if($(this).val() == '1') {
           $('#option2').hide();
           $('#option1').show();
       }else {
           
        $('#option1').hide();
           $('#option2').show();
       }
    });
</script>

</html>