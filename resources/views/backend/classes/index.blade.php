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
                                <h4 class="page-title"> {{ __('lang.class_list')}} </h4>
                            </div>
                            <div class="table-responsive">
                                <table id="adminList_table" class="table  w-100 text-center">
                                    <thead>
                                        <tr>                                            
                                            <th> {{ __('lang.grade_name')}} </th>
                                            <th> {{ __('lang.class_name')}} </th>
                                            <th style="width: 150px;"> {{ __('lang.action')}} </th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($classes as $classe)
                                            <tr>
                                                <input type="hidden" name="id" class="id" value="{{$classe->id}}" />  
                                                <input type="hidden" name="grade_id" class="grade_id" value="{{$classe->grade_id}}" />  
                                                <input type="hidden" name="classes" class="classes" value="{{$classe->name}}" />  

                                                <td>
                                                    @forelse($grades as $grade)
                                                        @php
                                                            if($grade->id == $classe->grade_id){
                                                                echo $grade->name;
                                                            } 
                                                        @endphp
                                                    @empty       
                                
                                                    @endforelse   
                                                </td>
                                                <td>{{ $classe->name }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-success mb-2 mr-1  btn-sm  modal-btn2" data-id="{{$classe->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i> {{ __('lang.edit')}} </a>
                                                    <a href="{{route('classes.delete', $classe->id)}}" onclick="return window.confirm('Are you sure?')" class="btn btn-danger mb-2 mr-1  btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-trash"></i>  {{ __('lang.delete')}} </a>    
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
                    <h4 class="modal-title"> {{ __('lang.edit_class')}} </h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
            
                <div class="modal-body">
                    <input type="hidden" name="id" class="id" id ="id" />
                    <input type="hidden" name="grade_id" class="grade_id" id ="grade_id" />

                    <div class="form-group">
                        <label for="classes" class="font-weight-600">  {{ __('lang.class_name')}}  :</label>
                        <input type="text" name="classes" id="classes1" class="form-control classes" required>
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
                let id = $(this).data('id');
                let classes = $(this).parents('tr').find('.classes').val().trim();     
                let grade_id = $(this).parents('tr').find('.grade_id').val().trim();     

                $("#edit_form .id").val(id);
                $("#edit_form .classes").val(classes);
                $("#edit_form .grade_id").val(grade_id);
              
                $("#editModal").modal();
            });

            $("#edit_form .btn-submit").click(function(){
                let _token = $('input[name=_token]').val();
                let id = $('#id').val();                
                let grade_id = $('#grade_id').val();
                var classes = $('#classes1').val();

                var form_data =new FormData();
            
                form_data.append("_token", _token);
                form_data.append("id", id);
                form_data.append("grade_id", grade_id);
                form_data.append("classes", classes);
              
                $.ajax({
                    url: "{{route('classes.update')}}",
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

