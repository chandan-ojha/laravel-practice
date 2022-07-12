<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Laravel8 Ajax Crud</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/students/students.css') }}">
</head>
<body>   
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h5>All<b> Students</b></h5></div>
                    <div class="col-sm-8">
                        <a href="#" type="button" class="btn btn-info add-new" data-toggle="modal" data-target="#addStudentModal"><i class="fa fa-plus"></i> Add New</a>
                        <button href="#deleteEmployeeModal" type="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-minus"></i> Delete</button>
                        <button type="button" class="btn btn-success add-new"><i class="fa fa-file"></i> Export Excell</button>
                        <button type="button" class="btn btn-success add-new"><i class="fa fa-file"></i> Import Excell</button>
                        <button type="button" class="btn btn-primary add-new"><i class="fa fa-file"></i> Export Pdf</button>
                    </div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered" id="studentTable">
                <thead>
                    <tr>
                        <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>ID</th>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>Address</th>
                        <th>City <i class="fa fa-sort"></i></th>
                        <th>Pin Code</th>
                        <th>Country <i class="fa fa-sort"></i></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->city }}</td>
                        <td>{{ $student->pin_code }}</td>
                        <td>{{ $student->country }}</td>
                        <td>
                            <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach      
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>  
</div>

<!-- Add Modal HTML -->
<div id="addStudentModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">						
				<h4 class="modal-title">Add Student</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
            <div class="modal-body">
			<form id="studentForm">
                @csrf				
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name">
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" class="form-control" id="address">
				</div>
				<div class="form-group">
					<label for="city">City</label>
					<input type="text" class="form-control" id="city">
				</div>
				<div class="form-group">
					<label for="pin_code">Pin Code</label>
					<input type="text" class="form-control"  id="pin_code">
				</div>
                <div class="form-group">
					<label for="country">Country</label>
					<input type="text" class="form-control" id="country">
				</div>	
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Submit">
				</div>
			</form>
           </div>
		</div>
	</div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete All students</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete all these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>

<!--Add Student -->
<script >
	$("#studentForm").submit(function(e){
     e.preventDefault();
     let name=$("#name").val();
     let address=$("#address").val();
     let city=$("#city").val();
     let pin_code=$("#pin_code").val();
     let country=$("#country").val();
     let _token =$("input[name=_token]").val();
     $.ajax({
     	url:"{{route('student.add')}}",
     	type:"POST",
     	data:{
            name:name,
            address:address,
            city:city,
            pin_code:pin_code,
            country:country,
     		_token:_token
     	},
     	success:function(response)
     	{
     		if(response)
     		{
     			$("#studentTable tbody").prepend('<tr><td><span class="custom-checkbox"><input type="checkbox" id="checkbox1" name="options[]" value="1"><label for="checkbox1"></label></span></td><td>'+response.id+'</td> <td>'+response.name+'</td> <td>'+response.address+'</td> <td>'+response.city+'</td> <td>'+response.pin_code+'</td> <td>'+response.country+'</td><td><a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a> <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></td></tr>');
     			$("#studentForm")[0].reset();
     			$("#addStudentModal").modal('hide');
     		}
     	}
     });
	});
</script>

<!-- JS here -->
<script src="{{ asset('assets/students/students.js') }}"></script>
</body>
</html>