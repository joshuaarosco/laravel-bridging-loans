<!DOCTYPE html>
<html>
<body>
	<h3>Hi {{$data->co1->fname}} {{$data->co1->lname}}</h3>
	<p>You are selected to be the Co-Borrower 1 of loan PB#: {{$data->pb_no}}.</p>
    <p>
		Thanks,</br>
		{{config('app.name')}}
	</p>
</body>
</html>