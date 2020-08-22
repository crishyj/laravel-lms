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
                                <h4 class="page-title"> {{ __('lang.student_attend_list')}} </h4>
                            </div>
                            <div class="table-responsive">
                                <table id="adminList_table" class="table  w-100 text-center">
                                    <thead>
                                        <tr>    
                                            <th> {{ __('lang.first_name')}} </th>                                        
                                            <th> {{ __('lang.last_name')}} </th>
                                            <th> {{ __('lang.middle_name')}} </th>
                                            <th> {{ __('lang.email')}} </th>
                                            <th> {{ __('lang.grade_name')}} </th>
                                            <th> {{ __('lang.class_name')}} </th>
                                            <th> {{ __('lang.attend_status')}} </th>
                                            <th style="width: 150px;"> {{ __('lang.action')}} </th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($students as $student)
                                                <tr>
                                                    <form action="" method="post">
                                                        @csrf
                                                    </form>
                                                    <input type="hidden" name="student" class="id" value="{{$student->id}}" />

                                                    @forelse($attends as $attend)
                                                        @php
                                                            if($attend->student_id == $student->id){
                                                               $attend_id = $attend->id;
                                                               
                                                            } 
                                                        
                                                        @endphp
                                                    @empty       
                                
                                                    @endforelse                                              

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
                                                        {{'Attended'}}
                                                    </td>
                                                    
                                                    <td>
                                                        <a href="{{route('attend.delete', $attend_id)}}" onclick="return window.confirm('Are you sure?')" class="btn btn-danger mb-2 mr-1  btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-trash"></i> Delete</a>    
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

@endsection


@section('after_script')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.submit_btn', function (){
                let _token =  $(this).parents('tr').find('input[name=_token]').val();                
                let student_id = $(this).parents('tr').find('.id').val().trim();     
                
                var fullDate = new Date()
                console.log(fullDate);
                var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) :(fullDate.getMonth()+1);
                var currentDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" +fullDate.getDate();
                console.log(currentDate);
                let status = currentDate;
                var form_data =new FormData();
            
                form_data.append("_token", _token);
                form_data.append("student_id", student_id);
                form_data.append("status", status);

                $.ajax({
                    url: "{{route('attend.create')}}",
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