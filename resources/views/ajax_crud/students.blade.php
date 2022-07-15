<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Laravel8 Ajax Crud</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
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
                               <a href="#" class="dropdown-item" data-toggle="modal" data-target="#importStudentModal">Excel</a>
                               <a href="#" class="dropdown-item" data-toggle="modal" data-target="#importStudentModal">CSV</a>
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
            <div class="table-data">
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
            <!-- <div class="clearfix">
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
            </div> -->
            </div>
        </div>
    </div>  
</div>

@include('ajax_crud.student_modal')
@include('ajax_crud.student_js')
{!! Toastr::message() !!}
</body>
</html>