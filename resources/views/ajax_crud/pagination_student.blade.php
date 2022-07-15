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
{{ $students->links() }}