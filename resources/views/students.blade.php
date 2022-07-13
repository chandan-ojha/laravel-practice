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
                        <a href="#" type="button" class="btn btn-danger" id="deleteAllSelectedRecord"><i class="fa fa-minus"></i> Delete</a>
                        <!-- Export button -->
                        <div class="btn-group">
                           <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-file"></i>  Export
                            </button>
                           <div class="dropdown-menu">
                               <a class="dropdown-item" href="{{route('export-excel-students')}}">Excel</a>
                               <a class="dropdown-item" href="{{route('export-csv-students')}}">CSV</a>
                               <a class="dropdown-item" href="{{route('download-pdf-students')}}">PDF</a>
                            </div>
                        </div>
                          <!-- Import button -->
                          <div class="btn-group">
                           <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-file"></i>  Import
                            </button>
                           <div class="dropdown-menu">
                               <a class="dropdown-item" href="#">Excel</a>
                               <a class="dropdown-item" href="#">CSV</a>
                            </div>
                        </div>
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
                        <th><input type="checkbox" id="chkCheckAll"> </th>
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
                    <tr id="sid{{$student->id}}">
                        <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$student->id}}"/> </td>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->city }}</td>
                        <td>{{ $student->pin_code }}</td>
                        <td>{{ $student->country }}</td>
                        <td>
                            <a href="javascript:void(0)" onclick="viewStudent({{$student->id}})" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="javascript:void(0)" onclick="editStudent({{$student->id}})" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="javascript:void(0)" onclick="deleteStudent({{$student->id}})" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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

<!-- Add Student Modal HTML -->
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
                    <button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
           </div>
		</div>
	</div>
</div>

<!-- View Student Modal HTML -->
<div id="viewStudentModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">						
				<h4 class="modal-title">Student Info</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
            <div class="modal-body">
			<form id="viewstudentForm">
                <input type="hidden" id="id" name="id">				
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name3">
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" class="form-control" id="address3">
				</div>
				<div class="form-group">
					<label for="city">City</label>
					<input type="text" class="form-control" id="city3">
				</div>
				<div class="form-group">
					<label for="pin_code">Pin Code</label>
					<input type="text" class="form-control"  id="pin_code3">
				</div>
                <div class="form-group">
					<label for="country">Country</label>
					<input type="text" class="form-control" id="country3">
				</div>	
			</form>
           </div>
		</div>
	</div>
</div>

<!-- Edit Student Modal HTML -->
<div id="editStudentModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">						
				<h4 class="modal-title">Update Student Info</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
            <div class="modal-body">
			<form id="editstudentForm">
                @csrf
                <input type="hidden" id="id" name="id">				
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name2">
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" class="form-control" id="address2">
				</div>
				<div class="form-group">
					<label for="city">City</label>
					<input type="text" class="form-control" id="city2">
				</div>
				<div class="form-group">
					<label for="pin_code">Pin Code</label>
					<input type="text" class="form-control"  id="pin_code2">
				</div>
                <div class="form-group">
					<label for="country">Country</label>
					<input type="text" class="form-control" id="country2">
				</div>	
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button type="submit" class="btn btn-success">Update</button>
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
     let name = $("#name").val();
     let address = $("#address").val();
     let city = $("#city").val();
     let pin_code = $("#pin_code").val();
     let country = $("#country").val();
     let _token = $("input[name=_token]").val();
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
     			$("#studentTable tbody").prepend('<tr><td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$student->id}}"/></td> <td>'+response.id+'</td> <td>'+response.name+'</td> <td>'+response.address+'</td> <td>'+response.city+'</td> <td>'+response.pin_code+'</td> <td>'+response.country+'</td> <td><a href="javascript:void(0)" onclick="viewStudent({{$student->id}})" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a> <a href="javascript:void(0)" onclick="editStudent({{$student->id}})" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> <a href="javascript:void(0)" onclick="deleteStudent({{$student->id}})" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a> </td></tr>');
     			$("#studentForm")[0].reset();
     			$("#addStudentModal").modal('hide');
     		}
     	}
     });
	});
</script>

<!--View Student -->
<script>
  function viewStudent(id)
  {
    $.get('/student/'+id,function(student){
            $("#id").val(student.id);
            $("#name3").val(student.name);
            $("#address3").val(student.address);
            $("#city3").val(student.city);
            $("#pin_code3").val(student.pin_code);
            $("#country3").val(student.country);
            $("#viewStudentModal").modal('toggle');
        });
  }
</script>

<!--Edit Student -->
<script>
  function editStudent(id)
  {
    $.get('/student/'+id,function(student){
            $("#id").val(student.id);
            $("#name2").val(student.name);
            $("#address2").val(student.address);
            $("#city2").val(student.city);
            $("#pin_code2").val(student.pin_code);
            $("#country2").val(student.country);
            $("#editStudentModal").modal('toggle');
        });

    $("#editstudentForm").submit(function(e){
       e.preventDefault();
       let id = $("#id").val();
       let name = $("#name2").val();
       let address = $("#address2").val();
       let city = $("#city2").val();
       let pin_code = $("#pin_code2").val();
       let country = $("#country2").val();
       let _token = $("input[name = _token]").val();
       $.ajax({ 
        url:"{{route('student.update')}}",
        type:"PUT",
        data:{
            id:id,
            name:name,
            address:address,
            city:city,
            pin_code:pin_code,
            country:country,
     		_token:_token
        },
        success:function(response)
        {
            $('#sid' + response.id + 'td:nth-child(1)').text(response.id);
            $('#sid' + response.id + 'td:nth-child(2)').text(response.name);
            $('#sid' + response.id + 'td:nth-child(3)').text(response.address);
            $('#sid' + response.id + 'td:nth-child(4)').text(response.city);
            $('#sid' + response.id + 'td:nth-child(5)').text(response.pin_code);
            $('#sid' + response.id + 'td:nth-child(6)').text(response.country);
            $('#editStudentModal').modal('toggle');
            $("#editstudentForm")[0].reset();
        }

       });
       
    });
  }
</script>

<!--Delete Student Record-->
<script >
    function deleteStudent(id)
    {
        if(confirm("Do you really want to delete this record?"))
        {
            $.ajax({
                url:'/student/'+id,
                type:'DELETE',
                data:{
                    _token:$("input[name=_token]").val()
                },
                success:function(response)
                {
                    $("#sid"+id).remove();
                }

            });
        }
    }
</script>

<!--Select all data & delete multiple student record-->
<script >
    $(function(e){ 
        $("#chkCheckAll").click(function(){
            $(".checkBoxClass").prop('checked',$(this).prop('checked'));
        });

        $("#deleteAllSelectedRecord").click(function(e){
            e.preventDefault();
            var allids=[];

            $("input:checkbox[name = ids]:checked").each(function(){
                allids.push($(this).val());
            });

            $.ajax({
                url:"{{route('student.deleteSelected')}}",
                type: "DELETE",
                data: {
                    _token:$("input[name=_token]").val(),
                    ids : allids
                },
                success:function(response){
                    $.each(allids,function(key,val){
                        $("#sid"+val).remove();
                    });
                }
            });
        });

    });
</script>

<!-- JS here -->
<script src="{{ asset('assets/students/students.js') }}"></script>
</body>
</html>