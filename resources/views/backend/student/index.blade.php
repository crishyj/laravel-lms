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
                                <h4 class="page-title">{{ __('lang.student_list')}}</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="adminList_table" class="table  w-100 text-center">
                                    <thead>
                                        <tr>                                            
                                            <th>{{ __('lang.first_name')}}</th>
                                            <th>{{ __('lang.last_name')}}</th>
                                            <th>{{ __('lang.middle_name')}}</th>
                                            <th>{{ __('lang.email')}}</th>
                                            <th>{{ __('lang.birthday')}}</th>
                                            <th>{{ __('lang.address')}}</th>
                                            <th>{{ __('lang.grade_name')}}</th>
                                            <th>{{ __('lang.last_school')}}</th>
                                            <th>{{ __('lang.last_grade')}}</th>
                                            <th>{{ __('lang.phone')}}</th>
                                            <th>{{ __('lang.parent1_first_name')}}</th>
                                            <th>{{ __('lang.parent1_last_name')}}</th>
                                            <th>{{ __('lang.parent1_phone')}}</th>
                                            <th>{{ __('lang.parent2_first_name')}}</th>
                                            <th>{{ __('lang.parent2_last_name')}}</th>
                                            <th>{{ __('lang.parent2_phone')}}</th>
                                            <th>{{ __('lang.profile_image')}}</th>
                                            <th style="width: 150px;">{{ __('lang.action')}}</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($options as $option)
                                            <tr>
                                                <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                                <input type="hidden" name="first_name" class="first_name" value="{{$option->first_name}}" />  
                                                <input type="hidden" name="last_name" class="last_name" value="{{$option->last_name}}" />  
                                                <input type="hidden" name="middle_name" class="middle_name" value="{{$option->middle_name}}" />  
                                                <input type="hidden" name="email" class="email" value="{{$option->email}}" />  
                                                <input type="hidden" name="birthday" class="birthday" value="{{$option->birthday}}" />   
                                                <input type="hidden" name="address" class="address" value="{{$option->address}}" />
                                                <input type="hidden" name="grade_id" class="grade" value="{{$option->grade_id}}" />
                                                <input type="hidden" name="last_school" class="last_school" value="{{$option->last_school}}" />
                                                <input type="hidden" name="last_grade" class="last_grade" value="{{$option->last_grade}}" />
                                                <input type="hidden" name="phone" class="phone" value="{{$option->phone}}" />
                                                <input type="hidden" name="parent1_first" class="parent1_first" value="{{$option->parent1_first}}" />
                                                <input type="hidden" name="parent1_last" class="parent1_last" value="{{$option->parent1_last}}" />
                                                <input type="hidden" name="parent1_phone" class="parent1_phone" value="{{$option->parent1_phone}}" />
                                                <input type="hidden" name="parent2_first" class="parent2_first" value="{{$option->parent2_first}}" />
                                                <input type="hidden" name="parent2_last" class="parent2_last" value="{{$option->parent2_last}}" />
                                                <input type="hidden" name="parent2_phone" class="parent2_phone" value="{{$option->parent2_phone}}" />
                                                <input type="hidden" name="profile_image" class="profile_image" value="{{$option->profile_image}}" />

                                                <td>{{ $option->first_name }}</td>
                                                <td>{{ $option->last_name }}</td>
                                                <td>{{ $option->middle_name }}</td>
                                                <td>{{ $option->email }}</td>
                                                <td>{{ $option->birthday }}</td>
                                                <td>{{ $option->address }}</td>
                                                <td>
                                                    @forelse($grades as $grade)
                                                    @php
                                                        if($grade->id == $option->grade_id){
                                                            echo $grade->name;
                                                        } 
                                                    @endphp
                                                @empty       
                            
                                                @endforelse 
                                                </td>
                                                <td>{{ $option->last_school }}</td>
                                                <td>{{ $option->last_grade }}</td>
                                                <td>{{ $option->phone }}</td>
                                                <td>{{ $option->parent1_first }}</td>
                                                <td>{{ $option->parent1_last }}</td>
                                                <td>{{ $option->parent1_phone }}</td>
                                                <td>{{ $option->parent2_first }}</td>
                                                <td>{{ $option->parent2_last }}</td>
                                                <td>{{ $option->parent2_phone }}</td>
                                                <td><img src = {{asset($option->profile_image)}} width = 50px> </td> 
                                                <td>
                                                    <a href="#" class="btn btn-success mb-2 mr-1  btn-sm  modal-btn2" data-id="{{$option->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i>{{ __('lang.edit')}}</a>
                                                    <a href="{{route('student.delete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="btn btn-danger mb-2 mr-1  btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-trash"></i> {{ __('lang.delete')}}</a>    
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
                                <input type="text" name="first_name" id="first_name" class="form-control first_name" required>
                            </div>   
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_name" class="font-weight-600"> {{ __('lang.last_name')}} :</label>
                                <input type="text" name="last_name" id="last_name" class="form-control last_name" required>
                            </div>   
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="middle_name" class="font-weight-600"> {{ __('lang.middle_name')}} :</label>
                                <input type="text" name="middle_name" id="middle_name" class="form-control middle_name" required>
                            </div>   
                        </div>
                    </div>           
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="font-weight-600"> {{ __('lang.email')}} :</label>
                                <input type="email" name="email" id="email" class="form-control email" required>
                            </div>  
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="birthday" class="font-weight-600"> {{ __('lang.birthday')}}:</label>
                                <input type="date" class="form-control birthday" id="birthday" name="birthday" placeholder="Last name" required>
                            </div>   
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address" class="font-weight-600"> {{ __('lang.address')}}:</label>
                                <input type="text" class="form-control address" id="address" name="address" placeholder="Last name" required>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone" class="font-weight-600"> {{ __('lang.phone')}}:</label>
                                <input type="text" name="phone" id="phone" class="form-control phone" required>
                            </div> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="subject" class="font-weight-600"> {{ __('lang.grade_name')}}:</label>
                                <select name="grade_id" id="grade_id" class="form-control grade_id">
                                    @foreach ($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_school" class="font-weight-600"> {{ __('lang.last_school')}}:</label>
                                <input type="text" name="subject" id="last_school" class="form-control last_school" required>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_grade" class="font-weight-600"> {{ __('lang.last_grade')}}:</label>
                                <input type="text" name="subject" id="last_grade" class="form-control last_grade" required>
                            </div>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="parent1_first" class="font-weight-600"> {{ __('lang.parent1_first_name')}}:</label>
                                <input type="text" name="parent1_first" id="parent1_first" class="form-control parent1_first" required>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="parent1_last" class="font-weight-600"> {{ __('lang.parent1_last_name')}}:</label>
                                <input type="text" name="parent1_last" id="parent1_last" class="form-control parent1_last" required>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="parent1_phone" class="font-weight-600"> {{ __('lang.parent1_phone')}}:</label>
                                <input type="text" name="parent1_phone" id="parent1_phone" class="form-control parent1_phone" required>
                            </div>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="parent2_first" class="font-weight-600"> {{ __('lang.parent2_first_name')}}:</label>
                                <input type="text" name="parent2_first" id="parent2_first" class="form-control parent2_first" required>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="parent2_last" class="font-weight-600"> {{ __('lang.parent2_last_name')}}:</label>
                                <input type="text" name="parent2_last" id="parent2_last" class="form-control parent2_last" required>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="parent2_phone" class="font-weight-600"> {{ __('lang.parent2_phone')}}:</label>
                                <input type="text" name="parent2_phone" id="parent2_phone" class="form-control parent2_phone" required>
                            </div>  
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="profile_image">{{ __('lang.profile_image')}}</label>
                        <div class="text-center">
                            <img src = "" class="profile_image" width = 100px>
                        </div>
                        <input type="file" name="profile_image" id="profile_image" class="form-control">
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
                let birthday = $(this).parents('tr').find('.birthday').val().trim();     
                let address = $(this).parents('tr').find('.address').val().trim();
                let phone = $(this).parents('tr').find('.phone').val().trim();
                let last_school = $(this).parents('tr').find('.last_school').val().trim();
                let last_grade = $(this).parents('tr').find('.last_grade').val().trim();
                let parent1_first = $(this).parents('tr').find('.parent1_first').val().trim();
                let parent1_last = $(this).parents('tr').find('.parent1_last').val().trim();
                let parent1_phone = $(this).parents('tr').find('.parent1_phone').val().trim();
                let parent2_first = $(this).parents('tr').find('.parent2_first').val().trim();
                let parent2_last = $(this).parents('tr').find('.parent2_last').val().trim();
                let parent2_phone = $(this).parents('tr').find('.parent2_phone').val().trim();
                let profile_image = $(this).parents('tr').find('.profile_image').val().trim();


                $("#edit_form .id").val(id);
                $("#edit_form .first_name").val(first_name);
                $("#edit_form .last_name").val(last_name);
                $("#edit_form .middle_name").val(middle_name);
                $("#edit_form .email").val(email);
                $("#edit_form .birthday").val(birthday);
                $("#edit_form .address").val(address);
                $("#edit_form .phone").val(phone);
                $("#edit_form .last_school").val(last_school);
                $("#edit_form .last_grade").val(last_grade);
                $("#edit_form .parent1_first").val(parent1_first);
                $("#edit_form .parent1_last").val(parent1_last);
                $("#edit_form .parent1_phone").val(parent1_phone);
                $("#edit_form .parent2_first").val(parent2_first);
                $("#edit_form .parent2_last").val(parent2_last);
                $("#edit_form .parent2_phone").val(parent2_phone);  
                $("#edit_form .profile_image").attr("src", '../'+profile_image);

                $("#editModal").modal();
            });

            $("#edit_form .btn-submit").click(function(){
                let _token = $('input[name=_token]').val();
                let id = $('#id').val();
                let first_name = $('#first_name').val();
                let last_name = $('#last_name').val();
                let middle_name = $('#middle_name').val();
                let email = $('#email').val();
                let birthday = $('#birthday').val();
                let grade_id = $('#grade_id').val();
                let address = $('#address').val();
                let phone = $('#phone').val();
                let last_school = $('#last_school').val();
                let last_grade = $('#last_grade').val();
                let parent1_first = $('#parent1_first').val();
                let parent1_last = $('#parent1_last').val();
                let parent1_phone = $('#parent1_phone').val();
                let parent2_first = $('#parent2_first').val();
                let parent2_last = $('#parent2_last').val();
                let parent2_phone = $('#parent2_phone').val();
                var file_data = $('#profile_image').prop('files')[0];

                var form_data =new FormData();
            
                form_data.append("_token", _token);
                form_data.append("id", id);
                form_data.append("first_name", first_name);
                form_data.append("last_name", last_name);
                form_data.append("middle_name", middle_name);
                form_data.append("email", email);
                form_data.append("birthday", birthday);
                form_data.append("address", address);
                form_data.append("grade_id", grade_id);
                form_data.append("phone", phone);
                form_data.append("last_school", last_school);
                form_data.append("last_grade", last_grade);
                form_data.append("parent1_first", parent1_first);
                form_data.append("parent1_last", parent1_last);
                form_data.append("parent1_phone", parent1_phone);
                form_data.append("parent2_first", parent2_first);
                form_data.append("parent2_last", parent2_last);
                form_data.append("parent2_last", parent2_last);
                form_data.append("parent2_phone", parent2_phone);
                form_data.append("profile_image", file_data);
                form_data.append("upload_file", true);

                $.ajax({
                    url: "{{route('student.update')}}",
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

