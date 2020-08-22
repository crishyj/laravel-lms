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
                                <h4 class="page-title">{{ __('lang.admin_list')}}</h4>
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
                                            <th>{{ __('lang.position')}}</th>
                                            <th>{{ __('lang.phone')}}</th>
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
                                                <input type="hidden" name="phone" class="phone" value="{{$option->phone}}" />
                                                <input type="hidden" name="profile_image" class="profile_image" value="{{$option->profile_image}}" />

                                                <td>{{ $option->first_name }}</td>
                                                <td>{{ $option->last_name }}</td>
                                                <td>{{ $option->middle_name }}</td>
                                                <td>{{ $option->email }}</td>
                                                <td>{{ $option->birthday }}</td>
                                                <td>{{ $option->address }}</td>
                                                <td>{{ $option->position }}</td>
                                                <td>{{ $option->phone }}</td>
                                                <td><img src = {{asset($option->profile_image)}} width = 50px> </td>  
                                                <td>
                                                    <a href="#" class="btn btn-success mb-2 mr-1  btn-sm  modal-btn2" data-id="{{$option->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i>{{ __('lang.edit')}}</a>                                                                                                                 
                                                    <a href="{{route('admin.delete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="btn btn-danger mb-2 mr-1  btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-trash"></i> {{ __('lang.delete')}}</a>    
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
                    <h4 class="modal-title">{{ __('lang.edit_admin')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="id" id ="id" />
                    <div class="form-group">
                        <label for="first_name" class="font-weight-600"> {{ __('lang.first_name')}} :</label>
                        <input type="text" name="first_name" id="first_name" class="form-control first_name" required>
                    </div>   

                    <div class="form-group">
                        <label for="last_name" class="font-weight-600"> {{ __('lang.last_name')}} :</label>
                        <input type="text" name="last_name" id="last_name" class="form-control last_name" required>
                    </div>   

                    <div class="form-group">
                        <label for="middle_name" class="font-weight-600"> {{ __('lang.middle_name')}} :</label>
                        <input type="text" name="middle_name" id="middle_name" class="form-control middle_name" >
                    </div>   

                    <div class="form-group mb-3">
                        <label for="email">{{ __('lang.email')}} </label>
                        <input type="email" class="form-control email" id="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label for="birthday" class="font-weight-600"> {{ __('lang.birthday')}} :</label>
                        <input type="date" class="form-control birthday" id="birthday" name="birthday" placeholder="Last name" required>
                    </div>   

                    <div class="form-group">
                        <label for="address" class="font-weight-600"> {{ __('lang.address')}} :</label>
                        <input type="text" name="address" id="address" class="form-control address" required>
                    </div>  

                    <div class="form-group">
                        <label for="phone" class="font-weight-600"> {{ __('lang.phone')}} :</label>
                        <input type="text" name="phone" id="phone" class="form-control phone" required>
                    </div> 
                    
                    <div class="form-group mb-3">
                        <label for="profile_image">{{ __('lang.profile_image')}} </label>
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
                let profile_image = $(this).parents('tr').find('.profile_image').val().trim();

                $("#edit_form .id").val(id);
                $("#edit_form .first_name").val(first_name);
                $("#edit_form .last_name").val(last_name);
                $("#edit_form .middle_name").val(middle_name);
                $("#edit_form .email").val(email);
                $("#edit_form .birthday").val(birthday);
                $("#edit_form .address").val(address);
                $("#edit_form .phone").val(phone);
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
                let address = $('#address').val();
                let phone = $('#phone').val();
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
                form_data.append("phone", phone);
                form_data.append("profile_image", file_data);
                form_data.append("upload_file", true);
                $.ajax({
                    url: "{{route('admin.update')}}",
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

