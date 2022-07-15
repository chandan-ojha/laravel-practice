<!-- Import Student Modal -->
<div id="importStudentModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">						
				<h4 class="modal-title">Import Student Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
            <div class="modal-body">
			<form method="POST" enctype="multipart/form-data" action="{{route('import-students')}}">
                @csrf				
				<div class="form-group">
                   <label for="file">Choose Excel/CSV</label>
                   <input type="file" name="file" class="form-control"/>
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
				<div class="errMsgContainer mb-3"></div>
                @csrf				
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name" id="name">
					<!-- @error('name') <p class="text-danger">{{$message}}</p> @enderror -->
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" class="form-control" name="address" id="address">
				</div>
				<div class="form-group">
					<label for="city">City</label>
					<input type="text" class="form-control" name="city" id="city">
				</div>
				<div class="form-group">
					<label for="pin_code">Pin Code</label>
					<input type="text" class="form-control" name="pin_code"  id="pin_code">
				</div>
                <div class="form-group">
					<label for="country">Country</label>
					<input type="text" class="form-control" name="country" id="country">
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
                <div class="errMsgContainer mb-3"></div>
                @csrf
                <input type="hidden" id="id" name="id">				
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name2" id="name2">
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" class="form-control" name="address2" id="address2">
				</div>
				<div class="form-group">
					<label for="city">City</label>
					<input type="text" class="form-control" name="city2" id="city2">
				</div>
				<div class="form-group">
					<label for="pin_code">Pin Code</label>
					<input type="text" class="form-control" name="pin_code2"  id="pin_code2">
				</div>
                <div class="form-group">
					<label for="country">Country</label>
					<input type="text" class="form-control" name="country2" id="country2">
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