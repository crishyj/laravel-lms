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
                                <h4 class="page-title">{{ __('lang.student_class_list')}}</h4>
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
                                        @forelse($students as $student)
                                            <tr>
                                                <input type="hidden" name="id" class="id" value="{{$student->id}}" />  
                                                <input type="hidden" name="grade_id" class="grade_id"/>  
                                                <input type="hidden" name="classes_id" class="classes_id" />  
                                                <input type="hidden" name="first_name" class="first_name" value=" {{$student->first_name}}">
                                                <input type="hidden" name="last_name" class="last_name" value="{{$student->last_name}}">
                                                <input type="hidden" name="middle_name" class="middle_name" value="{{$student->middle_name}}">
                                                <td>
                                                    {{$student->first_name}}
                                                </td>
                                                <td>
                                                    {{$student->last_name}}
                                                </td>
                                                <td>
                                                    {{$student->middle_name}}
                                                </td>
                                                <td>
                                                    @forelse($grades as $grade)
                                                        @php
                                                            if($grade->id == $student->grade_id){
                                                                echo $grade->name;
                                                            } 
                                                        @endphp
                                                    @empty       
                                
                                                    @endforelse   
                                                </td>
                                                <td>
                                                    @forelse($classes as $classe)
                                                        @php
                                                            if($student->classes_id == $classe->id){
                                                                echo $classe->name;
                                                            } 
                                                        @endphp
                                                    @empty       
                                
                                                    @endforelse 
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-success mb-2 mr-1  btn-sm  modal-btn2" data-id="{{$student->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i>{{ __('lang.edit')}}</a>                                                                                                                 
                                                    <a href="{{route('student.student_class_delete', $student->id)}}" onclick="return window.confirm('Are you sure?')" class="btn btn-danger mb-2 mr-1  btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-trash"></i> {{ __('lang.delete')}}</a>    
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
                        <input type="text" name="last_name" id="last_name" class="last_name form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="grade_ids" class="font-weight-600"> {{ __('lang.grade_name')}} :</label>
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
                            <option vlaue = ""> {{ __('lang.select_class')}}<option>
                            @foreach ($classes as $item)                                          
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

                $("#edit_form .id").val(id);
                $("#edit_form .classes_id").val(classes_id);
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
                console.log(id);
                console.log(grade_id);
                console.log(classes_id);

                var form_data =new FormData();
            
                form_data.append("_token", _token);
                form_data.append("id", id);
                form_data.append("grade_id", grade_id);
                form_data.append("classes_id", classes_id);
              
                $.ajax({
                    url: "{{route('student.student_class_update')}}",
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

