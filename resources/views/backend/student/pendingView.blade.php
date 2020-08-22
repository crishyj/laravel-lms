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
                                <h4 class="page-title">{{ __('lang.student_payment_list')}}</h4>
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
                                            <th>{{ __('lang.payment_status')}}</th>
                                            <th style="width: 150px;">{{ __('lang.action')}}</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($students as $student)
                                                <tr>
                                                    <form action="" method="post">
                                                        @csrf
                                                    </form>
                                                    <input type="hidden" name="id" class="id" value="{{$student->id}}" />  

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
                                                        {{$student->email}}
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
                                                        {{$student->payment}}
                                                    </td>
                                                    <td>
                                                        <a href="#" onclick="return window.confirm('Are you sure?')" class="btn btn-success mb-2 mr-1  btn-sm  submit_btn" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i>{{ __('lang.notice')}}</a>
                                                        <a href="{{route('pendingStudent.delete', $student->id)}}" onclick="return window.confirm('Are you sure?')" class="btn btn-danger mb-2 mr-1  btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-trash"></i> {{ __('lang.delete')}}</a>    
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

@endsection


@section('after_script')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.submit_btn', function (){
                let _token =  $(this).parents('tr').find('input[name=_token]').val();                
                let id = $(this).parents('tr').find('.id').val().trim();     
                
                var form_data =new FormData();
            
                form_data.append("_token", _token);
                form_data.append("id", id);

                $.ajax({
                    url: "{{route('pendingStudent.update')}}",
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