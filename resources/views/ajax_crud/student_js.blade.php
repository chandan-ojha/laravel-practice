<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<!--For Ajax SetUp-->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<!--Add Student Script-->
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
     	success:function(res)
     	{
     		if(res.status == 'success')
     		{
                $("#addStudentModal").modal('hide');
     			$("#studentForm")[0].reset();
                $('.table').load(location.href+' .table');
                //another way to show data in table
                // $("#studentTable tbody").prepend('<tr><td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$student->id}}"/></td> <td>'+response.id+'</td> <td>'+response.name+'</td> <td>'+response.address+'</td> <td>'+response.city+'</td> <td>'+response.pin_code+'</td> <td>'+response.country+'</td> <td><a href="javascript:void(0)" onclick="viewStudent({{$student->id}})" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a> <a href="javascript:void(0)" onclick="editStudent({{$student->id}})" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> <a href="javascript:void(0)" onclick="deleteStudent({{$student->id}})" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a> </td></tr>');
                Command: toastr["success"]("Student Added Successfully!","Success")
                toastr.options = {
                       "closeButton": true,
                       "debug": false,
                       "newestOnTop": false,
                       "progressBar": true,
                       "positionClass": "toast-top-right",
                       "preventDuplicates": false,
                       "onclick": null,
                       "showDuration": "300",
                       "hideDuration": "1000",
                       "timeOut": "5000",
                       "extendedTimeOut": "1000",
                       "showEasing": "swing",
                       "hideEasing": "linear",
                       "showMethod": "fadeIn",
                       "hideMethod": "fadeOut"
                    }
     		}
     	},error:function(err){
            let error = err.responseJSON;
            $.each(error.errors,function(index,value){
               $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>')
            });
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
    //Show student value in update form
    $.get('/student/'+id,function(student){
            $("#id").val(student.id);
            $("#name2").val(student.name);
            $("#address2").val(student.address);
            $("#city2").val(student.city);
            $("#pin_code2").val(student.pin_code);
            $("#country2").val(student.country);
            $("#editStudentModal").modal('toggle');
        });
        
    //Update student data
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
        success:function(res)
        {
            if(res.status == 'success')
            {
               $("#editStudentModal").modal('hide');
               $("#editstudentForm")[0].reset();
               $('.table').load(location.href+' .table');
               //another way to show update data in table
               /** $('#sid' + response.id + 'td:nth-child(1)').text(response.id);
               $('#sid' + response.id + 'td:nth-child(2)').text(response.name);
               $('#sid' + response.id + 'td:nth-child(3)').text(response.address);
               $('#sid' + response.id + 'td:nth-child(4)').text(response.city);
               $('#sid' + response.id + 'td:nth-child(5)').text(response.pin_code);
               $('#sid' + response.id + 'td:nth-child(6)').text(response.country); **/

               Command: toastr["success"]("Student Updated Successfully!","Success")
               toastr.options = {
                       "closeButton": true,
                       "debug": false,
                       "newestOnTop": false,
                       "progressBar": true,
                       "positionClass": "toast-top-right",
                       "preventDuplicates": false,
                       "onclick": null,
                       "showDuration": "300",
                       "hideDuration": "1000",
                       "timeOut": "5000",
                       "extendedTimeOut": "1000",
                       "showEasing": "swing",
                       "hideEasing": "linear",
                       "showMethod": "fadeIn",
                       "hideMethod": "fadeOut"
                    }
            }   
        },error:function(err){
            let error = err.responseJSON;
            $.each(error.errors,function(index,value){
               $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>')
            });
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

                    Command: toastr["success"]("Student Deleted!","Success")
                    toastr.options = {
                       "closeButton": true,
                       "debug": false,
                       "newestOnTop": false,
                       "progressBar": true,
                       "positionClass": "toast-top-right",
                       "preventDuplicates": false,
                       "onclick": null,
                       "showDuration": "300",
                       "hideDuration": "1000",
                       "timeOut": "5000",
                       "extendedTimeOut": "1000",
                       "showEasing": "swing",
                       "hideEasing": "linear",
                       "showMethod": "fadeIn",
                       "hideMethod": "fadeOut"
                    }
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

<!--Pagination-->
<script>
    $(document).on('click','.pagination a',function(e){
      e.preventDefault();
      let page = $(this).attr('href').split('page=')[1]
      student(page)
    });

    function student(page){
      $.ajax({
        url: "/pagination/paginate-data?page="+page,
        success:function(res){
           $('.table-data').html(res)
        }
      })
    }
</script>

<!--Search-->
<script>
    $(document).on('keyup',function(e){
        e.preventDefault();
        let search_string = $('#search').val();
        // console.log(search_string);
        $.ajax({
            url : "{{route('search.student')}}",
            method : 'GET',
            data : {search_string:search_string},
            success : function(res){
                $('.table-data').html(res);
                if(res.status == 'nothing_found'){
                    $('.table-data').html('<span class="text-danger">'+'Data Not Found'+'</span>');
                }
            }
        });
    })
</script>

<!-- JS here -->
<script src="{{ asset('assets/students/students.js') }}"></script>
