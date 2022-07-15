<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Students</title>
	<style >
		#stu{
			font-family: Arial,Helvetica,sans-serif;
			border-collapse: collapse;
			width: 100%;
		}
		#stu td,#stu th{
			border: 1px solid #ddd;
			padding: 8px;
		}
		#stu tr:nth-child(even){
            background-color: #0bfdfd;
		}
		#stu th{
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: #fff;
		}
	</style>
</head>
<body>
	<table id="stu">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Address</th>
				<th>City</th>
				<th>Pin Code</th>
				<th>Country</th>
			</tr>
		</thead>
		<tbody>
			@foreach($students as $student)
               <tr>
               	<td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->address}}</td>
                <td>{{$student->city}}</td>
                <td>{{$student->pin_code}}</td>
                <td>{{$student->country}}</td>
               </tr>
			@endforeach
		</tbody>
	</table>
	
</body>
</html>