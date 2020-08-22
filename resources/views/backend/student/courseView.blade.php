@extends('layouts/backMain')
@extends('layouts/directorSide')

@section('content')

<div class="content-page">
    <div class="content">
       <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="page-title-box">                   
                                <h4 class="page-title">{{ __('lang.student_course_list')}}</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="adminList_table" class="table  w-100 text-center">
                                    <thead>
                                        <tr>                                            
                                            <th>{{ __('lang.first_name')}}</th>
                                            <th>{{ __('lang.last_name')}}</th>
                                            <th>{{ __('lang.middle_name')}}</th>
                                            <th>{{ __('lang.email')}}</th>                                          
                                            <th>{{ __('lang.grade_name')}}</th>
                                            <th>{{ __('lang.class_name')}}</th>
                                            <th>{{ __('lang.course_name')}}</th>
                                            <th>{{ __('lang.profile_image')}}</th>
                                            <th style="width: 150px;">{{ __('lang.action')}}</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($students as $option)
                                            <tr>
                                                <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                                <input type="hidden" name="first_name" class="first_name" value="{{$option->first_name}}" />  
                                                <input type="hidden" name="last_name" class="last_name" value="{{$option->last_name}}" />  
                                                <input type="hidden" name="middle_name" class="middle_name" value="{{$option->middle_name}}" />  
                                                <input type="hidden" name="email" class="email" value="{{$option->email}}" />  
                                                <input type="hidden" name="course" class="course" value="{{$option->course_name}}"/>
                                                <input type="hidden" name="profile_image" class="profile_image" value="{{$option->profile_image}}" />

                                                <td>{{ $option->first_name }}</td>
                                                <td>{{ $option->last_name }}</td>
                                                <td>{{ $option->middle_name }}</td>
                                                <td>{{ $option->email }}</td>
                                                <td class="grade">
                                                    @forelse($grades as $grade)
                                                        @php
                                                            if($grade->id == $option->grade_id){
                                                                echo $grade->name;
                                                            } 
                                                        @endphp
                                                    @empty       
                                
                                                    @endforelse 
                                                </td>
                                                <td class="classes">
                                                    @forelse($classes as $classe)
                                                        @php
                                                            if($option->classes_id == $classe->id){
                                                                echo $classe->name;
                                                            } 
                                                        @endphp
                                                    @empty       
                                
                                                    @endforelse 
                                                </td>
                                                <td>{{ $option->course_name }}</td>
                                                <td><img src = {{asset($option->profile_image)}} width = 50px> </td> 
                                                <td>
                                                    <a href="#" class="btn btn-success mb-2 mr-1  btn-sm  modal-btn2" data-id="{{$option->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i>{{ __('lang.edit')}}</a>
                                                </td>                       
                                            </tr>
                                        @empty       
                                        
                                        @endforelse    
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
           
        </div>
    </div>
</div>
 

<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" id="edit_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('lang.edit_student')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="id" id ="id" />

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_name" class="font-weight-600"> {{ __('lang.first_name')}} :</label>
                                <input type="text" name="first_name" id="first_name" class="form-control first_name" readonly>
                            </div>   
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_name" class="font-weight-600"> {{ __('lang.last_name')}} :</label>
                                <input type="text" name="last_name" id="last_name" class="form-control last_name" readonly>
                            </div>   
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="middle_name" class="font-weight-600"> {{ __('lang.middle_name')}} :</label>
                                <input type="text" name="middle_name" id="middle_name" class="form-control middle_name" readonly>
                            </div>   
                        </div>
                    </div>           
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="font-weight-600"> {{ __('lang.email')}} :</label>
                                <input type="email" name="email" id="email" class="form-control email" readonly>
                            </div>  
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="grade" class="font-weight-600"> {{ __('lang.grade_name')}} :</label>
                                <input type="text" name="grade" id="grade" class="form-control grade" readonly>
                            </div>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="classes" class="font-weight-600"> {{ __('lang.class_name')}} :</label>
                                <input type="text" name="classes" id="classes" class="form-control classes" readonly>
                            </div>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="course" class="font-weight-600"> {{ __('lang.course_name')}} :</label>
                                <input type="text" name="course" id="course" class="form-control course">
                            </div>  
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="profile_image">{{ __('lang.profile_image')}}</label>
                        <div class="text-center">
                            <img src = "" class="profile_image" width = 100px>
                        </div>                       
                    </div>
                    
                                
                </div>              
                
                <div class="modal-footer">    
                    <button type="button" class="btn btn-primary btn-submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>&nbsp;{{ __('lang.save')}}</button>                       
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>&nbsp;{{ __('lang.close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('after_script')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.modal-btn2', function (){
                let id = $(this).data('id');
                let first_name = $(this).parents('tr').find('.first_name').val().trim();     
                let last_name = $(this).parents('tr').find('.last_name').val().trim();     
                let middle_name = $(this).parents('tr').find('.middle_name').val().trim();     
                let email = $(this).parents('tr').find('.email').val().trim();     
                let grade = $(this).parents('tr').find('.grade').html().trim();  
                let classes = $(this).parents('tr').find('.classes').html().trim(); 
                let course = $(this).parents('tr').find('.course').val().trim();     
                let profile_image = $(this).parents('tr').find('.profile_image').val().trim();


                $("#edit_form .id").val(id);
                $("#edit_form .first_name").val(first_name);
                $("#edit_form .last_name").val(last_name);
                $("#edit_form .middle_name").val(middle_name);
                $("#edit_form .email").val(email);
                $("#edit_form .grade").val(grade);
                $("#edit_form .classes").val(classes);
                $("#edit_form .course").val(course);
                $("#edit_form .profile_image").attr("src", '../'+profile_image);

                $("#editModal").modal();
            });

            $("#edit_form .btn-submit").click(function(){
                let _token = $('input[name=_token]').val();
                let id = $('#id').val();
                let course_name = $('#course').val();

                var form_data =new FormData();
            
                form_data.append("_token", _token);
                form_data.append("id", id);
                form_data.append('course_name', course_name);

                $.ajax({
                    url: "{{route('student.student_course_update')}}",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success : function(response) {
                        if(response == 'success') {  
                            alert('Updated Successfully.');
                            window.location.reload();                          
                        } else {
                            let messages = response.data;
                            if(messages.option) {
                                // $('#edit_form .option_error strong').text(messages.option[0]);
                                // $('#edit_form .option_error').show();
                                // $('#edit_form .option').focus();
                            }
                        }
                    },
                    error: function(response) {
                        $("#ajax-loading").fadeOut();
                        if(response.responseJSON.message == 'The given data was invalid.'){                            
                            let messages = response.responseJSON.errors;
                            if(messages.option) {
                                // $('#edit_form .option_error strong').text(messages.option[0]);
                                // $('#edit_form .option_error').show();
                                // $('#edit_form .option').focus();
                            }
                            alert("Something went wrong");
                            window.location.reload();        
                        } else {
                            alert("Something went wrong");
                        }
                    }
                });
            });
        });
    </script>
    
@endsection

