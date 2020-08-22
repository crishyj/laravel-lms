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
                                <h4 class="page-title">{{ __('lang.teacher_class_list')}}</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="adminList_table" class="table  w-100 text-center">
                                    <thead>
                                        <tr>    
                                            <th>{{ __('lang.first_name')}}</th>                                        
                                            <th>{{ __('lang.last_name')}}</th>
                                            <th>{{ __('lang.middle_name')}}</th>
                                            <th>{{ __('lang.grade_name')}}</th>
                                            <th>{{ __('lang.class_name')}}</th>
                                            <th style="width: 150px;">{{ __('lang.action')}}</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($classes as $classe)
                                            <tr>
                                                @php
                                                    $teacher_id = $classe->teacher_id;
                                                @endphp

                                                @forelse($teachers as $teacher)
                                                    @php
                                                        if($teacher->id == $teacher_id){
                                                            $first_name  = $teacher->first_name;
                                                            $last_name  = $teacher->last_name;
                                                            $middle_name  = $teacher->middle_name;
                                                            $email  = $teacher->email;
                                                            $grade_id  = $teacher->grade_id;
                                                        } 
                                                    @endphp
                                                @empty       
                        
                                            @endforelse
                                                <input type="hidden" name="id" class="id" value="{{$teacher_id}}" />  
                                                <input type="hidden" name="first_name" class="first_name" value=" {{$first_name }}">
                                                <input type="hidden" name="last_name" class="last_name" value="{{$last_name}}">
                                                <input type="hidden" name="middle_name" class="middle_name" value="{{$middle_name}}">
                                                <input type="hidden" name="grade_id" class="grade_id" value="{{$grade_id}}"/>  
                                                <input type="hidden" name="classes_id" class="classes_id" value="{{$classe->id}}"/>  
                                                <input type="hidden" name="old_classes_id" class="old_classes_id" value="{{$classe->id}}"/>  
                                                <td>
                                                    {{$first_name}}
                                                </td>
                                                <td>
                                                    {{$last_name}}
                                                </td>
                                                <td>
                                                    {{$middle_name}}
                                                </td>
                                                <td>
                                                    @forelse($grades as $grade)
                                                        @php
                                                            if($grade->id == $grade_id){
                                                                echo $grade->name;
                                                            } 
                                                        @endphp
                                                    @empty       
                                
                                                    @endforelse   
                                                </td>
                                                <td>
                                                   {{$classe->name}}
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-success mb-2 mr-1  btn-sm  modal-btn2" data-id="{{$teacher->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i>Edit</a>                                                                                                                 
                                                    <a href="{{route('teacher.teacher_class_delete', $teacher->id)}}" onclick="return window.confirm('Are you sure?')" class="btn btn-danger mb-2 mr-1  btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-trash"></i> Delete</a>    
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
                    <h4 class="modal-title">{{ __('lang.edit_class')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
            
                <div class="modal-body">
                    <input type="hidden" name="id" class="id" id ="id" />
                    <input type="hidden" name="grade_id" class="grade_id" id ="grade_id" />
                    <input type="hidden" name="old_classes_id" class="old_classes_id" id ="old_classes_id" />
                    <input type="hidden" name="classes_id" class="classes_id" id ="classes_id" />

                    <div class="form-group">
                        <label for="first_name">{{ __('lang.first_name')}}</label>
                        <input type="text" name="first_name" id="first_name" class="first_name form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="last_name">{{ __('lang.last_name')}}</label>
                        <input type="text" name="last_name" id="last_name" class="last_name form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="middle_name">{{ __('lang.middle_name')}}</label>
                        <input type="text" name="middle_name" id="middle_name" class="middle_name form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="grade_ids" class="font-weight-600">{{ __('lang.grade_name')}}:</label>
                        <select name="grade_ids" id="grade_ids" class="form-control grade_ids">
                            <option value="">{{ __('lang.select_grade')}}</option>
                            @foreach ($grades as $grade)                                          
                                <option value="{{$grade->id}}">{{ $grade->name}}</option>
                            @endforeach
                        </select>
                    </div>   

                    <div class="form-group">
                        <label for="classes" class="font-weight-600"> {{ __('lang.class_name')}} :</label>
                        <select name="classes" id="classes_ids" class="form-control classes">
                            <option vlaue = "">{{ __('lang.select_class')}}<option>
                            @foreach ($allClasses as $item)                                          
                                <option data-grade="{{$item->grade_id}}" value="{{$item->id}}" class="student_class_item">
                                    {{ $item->name}}
                                </option>
                            @endforeach
                        </select>
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
                let classes_id = $(this).parents('tr').find('.classes_id').val().trim();     
                let grade_id = $(this).parents('tr').find('.grade_id').val().trim();     
                let first_name = $(this).parents('tr').find('.first_name').val().trim();     
                let last_name = $(this).parents('tr').find('.last_name').val().trim();     
                let middle_name = $(this).parents('tr').find('.middle_name').val().trim();     
                let old_classes_id = $(this).parents('tr').find('.old_classes_id').val().trim();     

                $("#edit_form .id").val(id);
                $("#edit_form .classes_id").val(classes_id);
                $("#edit_form .old_classes_id").val(old_classes_id);
                $("#edit_form .grade_id").val(grade_id);
                $("#edit_form .first_name").val(first_name);
                $("#edit_form .last_name").val(last_name);
                $("#edit_form .middle_name").val(middle_name);
              
                $("#editModal").modal();
            });


            $(".grade_ids").change(function(){
                $("#classes_ids option").each(function() {
                    $(this).css('display', 'none');
                })
                var grade_ids = $(this).children("option:selected").val();
                $("#edit_form .grade_id").val(grade_ids);

                $("#classes_ids option").each(function() {
                    if($(this).data('grade') == grade_ids){
                        $(this).css('display', 'block');                       
                    }                        
                });
            });

            $('#classes_ids').change(function(){
                var classes_ids = $(this).children("option:selected").val();
                $("#edit_form #classes_id").val(classes_ids);
            });


            $("#edit_form .btn-submit").click(function(){
                let _token = $('input[name=_token]').val();
                let id = $('#id').val();                
                let grade_id = $('#grade_id').val();
                var classes_id = $('#classes_id').val();
                var old_classes_id = $('#old_classes_id').val();
                var form_data =new FormData();
            
                form_data.append("_token", _token);
                form_data.append("id", id);
                form_data.append("grade_id", grade_id);
                form_data.append("classes_id", classes_id);
                form_data.append("old_classes_id", old_classes_id);
              
                $.ajax({
                    url: "{{route('teacher.teacher_class_update')}}",
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

