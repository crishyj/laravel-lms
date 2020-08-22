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
                                <h4 class="page-title">{{ __('lang.student_score_list')}}</h4>
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
                                            <th>{{ __('lang.assgin_name')}}</th>
                                            <th>{{ __('lang.score')}}</th>
                                            <th style="width: 150px;">{{ __('lang.action')}}</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($scores as $score)
                                                <tr>
                                                    <form action="" method="post">
                                                        @csrf
                                                    </form>
                                                    <input type="hidden" name="id" class="id" value="{{$score->id}}" />  
                                                    <input type="hidden" name="score" class="score" value="{{$score->score}}">
                                                    @php
                                                        $student_id = $score->student_id;        
                                                    @endphp
                                                    @forelse($students as $student)
                                                        @php
                                                            if($student->id == $student_id){
                                                                $first_name  = $student->first_name;
                                                                $last_name  = $student->last_name;
                                                                $middle_name  = $student->middle_name;
                                                                $email  = $student->email;
                                                                $student_grade_id  = $student->grade_id;
                                                                $classe_id = $student->classes_id;
                                                            } 
                                                        @endphp
                                                    @empty       
                                
                                                    @endforelse

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
                                                        {{$email}}
                                                    </td>
                                                    
                                                    <td>
                                                        @forelse($grades as $grade)
                                                            @php
                                                                if($grade->id == $student_grade_id){
                                                                    echo $grade->name;
                                                               } 
                                                            @endphp
                                                        @empty       
                                    
                                                        @endforelse   
                                                    </td>

                                                    <td>
                                                        @forelse($classes as $classe)
                                                            @php
                                                                if($classe->id == $classe_id){
                                                                    echo $classe->name;
                                                                } 
                                                            @endphp
                                                        @empty       
                                    
                                                        @endforelse 
                                                    </td> 
                                                    <td>
                                                        @foreach ($assignments as $item)
                                                            @php
                                                                if($item->id == $score->assignment_id){
                                                                   echo $item->name;
                                                                }
                                                            @endphp
                                                        @endforeach
                                                    </td>

                                                    <td>
                                                        {{$score->score}}
                                                    </td>
                                                   
                                                    <td>
                                                        <a href="#" class="btn btn-success mb-2 mr-1  btn-sm  modal-btn2" data-id="{{$score->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i>{{ __('lang.edit')}}</a>
                                                        <a href="{{route('score.delete', $score->id)}}" onclick="return window.confirm('Are you sure?')" class="btn btn-danger mb-2 mr-1  btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-trash"></i> {{ __('lang.delete')}}</a>    
                                                    </td>                       
                                                </tr>
                                            
                                        @empty       
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
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
                    <h4 class="modal-title">{{ __('lang.edit_score')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="id" id ="id" />

                    <div class="form-group mb-3">
                        <label for="score">{{ __('lang.grade_name')}}</label>
                        <input type="number" name="score" step=0.01 class="form-control score" id = "score" required/> 
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
                let score =  $(this).parents('tr').find('.score').val().trim();         
                $("#edit_form .id").val(id);
                $("#edit_form .score").val(score);
                $("#editModal").modal();
            });


            $("#edit_form .btn-submit").click(function(){              
                let _token = $('input[name=_token]').val();
                let id = $('#id').val();
                let score = $('#score').val();

                var form_data =new FormData();
            
                form_data.append("_token", _token);
                form_data.append("id", id);
                form_data.append("score", score);

                $.ajax({
                    url: "{{route('score.update')}}",
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