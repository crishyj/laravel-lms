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
                                <h4 class="page-title">{{ __('lang.assign_list')}}</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="adminList_table" class="table  w-100 text-center">
                                    <thead>
                                        <tr>    
                                            <th> {{ __('lang.assgin_name')}} </th>                                        
                                            <th> {{ __('lang.video')}} </th>
                                            <th> {{ __('lang.attached')}} </th>
                                            <th> {{ __('lang.grade_name')}} </th>
                                            <th> {{ __('lang.class_name')}} </th>
                                            <th> {{ __('lang.course_name')}} </th>
                                            <th style="width: 150px;"> {{ __('lang.action')}} </th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($assignments as $assignment)
                                            <tr>
                                                <input type="hidden" name="id" class="id" value="{{$assignment->id}}" />  
                                                <input type="hidden" name="grade_id" class="grade_id" value= "{{$assignment->grade_id}}"/>  
                                                <input type="hidden" name="classes_id" class="classes_id" value="{{$assignment->classes_id}}"/>  
                                                <input type="hidden" name="course_id" class="course_id" value="{{$assignment->course_id}}"/>
                                                <input type="hidden" name="name" class="name" value="{{$assignment->name}}">
                                                <input type="hidden" name="attach" class="attach" value="{{$assignment->attach}}">
                                                <input type="hidden" name="video" class="video" value="{{$assignment->video}}">
                                                <td>
                                                    {{$assignment->name}}
                                                </td>
                                                <td>
                                                    <a href="{{asset($assignment->video)}}" target="_blank"><i class="mdi mdi-video-box"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{asset($assignment->attach)}}" target="_blank"><i class="mdi mdi-file-document"></i></a>
                                                </td>
                                                <td>
                                                    @forelse($grades as $grade)
                                                        @php
                                                            if($grade->id == $assignment->grade_id){
                                                                echo $grade->name;
                                                            } 
                                                        @endphp
                                                    @empty       
                                
                                                    @endforelse   
                                                </td>
                                                <td>
                                                    @forelse($classes as $classe)
                                                        @php
                                                            if($assignment->classes_id == $classe->id){
                                                                echo $classe->name;
                                                            } 
                                                        @endphp
                                                    @empty       
                                
                                                    @endforelse 
                                                </td>
                                                <td>
                                                    @forelse($courses as $course)
                                                        @php
                                                            if($assignment->course_id == $course->id){
                                                                echo $course->name;
                                                            } 
                                                        @endphp
                                                    @empty       
                                
                                                    @endforelse 
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-success mb-2 mr-1  btn-sm  modal-btn2" data-id="{{$assignment->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i> {{ __('lang.edit')}} </a>
                                                    <a href="{{route('teacher_assign.delete', $assignment->id)}}" onclick="return window.confirm('Are you sure?')" class="btn btn-danger mb-2 mr-1  btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-trash"></i>  {{ __('lang.delete')}} </a>
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
                    <h4 class="modal-title">Edit Assignment</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
            
                <div class="modal-body">
                    <input type="hidden" name="id" class="id" id ="edit_id"/>
                    <input type="hidden" name="grade_id" class="grade_id" id = "edit_grade_id"/>  
                    <input type="hidden" name="classes_id" class="classes_id" id = "edit_classes_id"/>  
                    <input type="hidden" name="course_id" class="course_id" id = "edit_course_id"/>

                    <div class="form-group">
                        <label for="name"> {{ __('lang.assgin_name')}} </label>
                        <input type="text" name="name" id="edit_name" class="name form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="video"> {{ __('lang.video_upload')}} </label>
                        <input type="file" name="video" id="edit_video" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="attach"> {{ __('lang.assign_upload')}} </label>
                        <input type="file" name="attach" id="edit_attach" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="grade_ids" class="font-weight-600"> {{ __('lang.grade_name')}}  :</label>
                        <select name="grade_ids" id="grade_ids" class="form-control grade_ids">
                            <option value=""> {{ __('lang.select_grade')}} </option>
                            @foreach ($grades as $grade)                                          
                                <option value="{{$grade->id}}">{{ $grade->name}}</option>
                            @endforeach
                        </select>
                    </div>   

                    <div class="form-group mb-3">
                        <label for="student_class"> {{ __('lang.class_name')}} </label>
                        <select name="student_class" id="student_class" class="form-control student_class">
                            <option vlaue = ""> {{ __('lang.select_class')}} <option>
                            @foreach ($classes as $item)                                          
                                <option data-grade="{{$item->grade_id}}" value="{{$item->id}}" class="student_class_item">
                                    {{ $item->name}}
                                </option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="course"> {{ __('lang.course_name')}} </label>
                        <select name="course_ids" id="course" class="form-control course_ids">
                            <option value=""> {{ __('lang.select_course')}} </option>
                            @foreach ($courses as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>              
                
                <div class="modal-footer">    
                    <button type="button" class="btn btn-primary btn-submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>&nbsp; {{ __('lang.save')}} </button>                       
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>&nbsp; {{ __('lang.close')}} </button>
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
                let id = $(this).parents('tr').find('.id').val().trim();     
                let classes_id = $(this).parents('tr').find('.classes_id').val().trim();     
                let grade_id = $(this).parents('tr').find('.grade_id').val().trim();     
                let name = $(this).parents('tr').find('.name').val().trim();   

                $("#edit_form .id").val(id);
                $("#edit_form .name").val(name);
                $("#editModal").modal();
            });


            $("#edit_form #grade_ids").change(function(){
                $("#edit_form #student_class option").each(function() {
                    $(this).css('display', 'none');
                })
                var student_grade = $(this).children("option:selected").val();
                $("#edit_form .grade_id").val(student_grade);

                $("#student_class option").each(function() {
                    if($(this).data('grade') == student_grade){
                        $(this).css('display', 'block');                       
                    }                        
                });
            });

            $('.student_class').change(function(){
                var classes_id = $(this).children("option:selected").val();
                $('.classes_id').val(classes_id);
            });

            $('#edit_form .course_ids').change(function(){
                var course_id = $(this).children("option:selected").val();
                $('#edit_form .course_id').val(course_id);
            })


            $("#edit_form .btn-submit").click(function(){
                let _token = $('input[name=_token]').val();
                let id = $('#edit_id').val();       
                let name = $('#edit_name').val();       
                let grade_id = $('#edit_grade_id').val();
                var classes_id = $('#edit_classes_id').val();
                var course_id = $('#edit_course_id').val();
                var video = $('#edit_video').prop('files')[0];
                var attach = $('#edit_attach').prop('files')[0];

                var form_data =new FormData();
            
                form_data.append("_token", _token);
                form_data.append("id", id);
                form_data.append("name", name);
                form_data.append("grade_id", grade_id);
                form_data.append("classes_id", classes_id);
                form_data.append("course_id", course_id);
                form_data.append("video", video);
                form_data.append("attach", attach);
              
                $.ajax({
                    url: "{{route('teacher_assign.update')}}",
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
                            let messages = response;
                            console.log(messages);

                            if(messages == 'The given data was invalid.'){
                                alert("Class already exist!");
                                window.location.reload();        
                            }  
                            
                        }
                    },
                    error: function(response) {
                        $("#ajax-loading").fadeOut();
                        if(response.responseJSON.message == 'The given data was invalid.'){                            
                            let messages = response.responseJSON.errors;
                            if(messages.option) {
                               
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

