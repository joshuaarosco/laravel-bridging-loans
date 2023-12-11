<!DOCTYPE html>
<html>
<body>
	<h3>Hi {{$data->user->fname}} {{$data->user->lname}}</h3>
	<p>Your loan PB#: {{$data->pb_no}} has been fully paid. Apply for another loan!</p>
    <p>
		Thanks,</br>
		{{config('app.name')}}
	</p>
</body>
</html>