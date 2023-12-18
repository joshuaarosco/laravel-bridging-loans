<!DOCTYPE html>
<html>
<body>
	<h3>Hi {{$data->co2->fname}} {{$data->co2->lname}}</h3>
	<p>You are selected to be the Co-Borrower 2 of loan PB#: {{$data->pb_no}}.</p>
    <p>
		Thanks,</br>
		{{config('app.name')}}
	</p>
</body>
</html>