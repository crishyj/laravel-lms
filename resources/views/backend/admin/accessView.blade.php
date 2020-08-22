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
                                            <th> {{ __('lang.birthday')}} </th>
                                            <th> {{ __('lang.address')}} </th>
                                            <th> {{ __('lang.position')}} </th>
                                            <th> {{ __('lang.phone')}} </th>
                                            <th> {{ __('lang.profile_image')}} </th>
                                            <th style="width: 150px;"> {{ __('lang.action')}} </th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($admins as $item)
                                            <tr>
                                                <input type="hidden" name="id" class="id" value="{{$item->id}}" />  
                                                <input type="hidden" name="first_name" class="first_name" value="{{$item->first_name}}" />  
                                                <input type="hidden" name="last_name" class="last_name" value="{{$item->last_name}}" />  
                                                <input type="hidden" name="middle_name" class="middle_name" value="{{$item->middle_name}}" />  
                                                <input type="hidden" name="email" class="email" value="{{$item->email}}" />  
                                                <input type="hidden" name="birthday" class="birthday" value="{{$item->birthday}}" />   
                                                <input type="hidden" name="address" class="address" value="{{$item->address}}" />
                                                <input type="hidden" name="phone" class="phone" value="{{$item->phone}}" />
                                                <input type="hidden" name="profile_image" class="profile_image" value="{{$item->profile_image}}" />

                                                <td>{{ $item->first_name }}</td>
                                                <td>{{ $item->last_name }}</td>
                                                <td>{{ $item->middle_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->birthday }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->position }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td><img src = {{asset($item->profile_image)}} width = 50px> </td> 
                                                <td>
                                                    <a href="#" class="btn btn-success mb-2 mr-1  btn-sm  modal-btn2" data-id="{{$item->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i>Edit</a>                                                                                                                 
                                                    <a href="{{route('adminAccess.delete', $item->id)}}" onclick="return window.confirm('Are you sure?')" class="btn btn-danger mb-2 mr-1  btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-trash"></i> Delete</a>    
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
                    <h4 class="modal-title"> {{ __('lang.change_password')}} </h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
            
                <div class="modal-body">
                    <input type="hidden" name="id" class="id" id ="id" />

                    <div class="form-group mb-3">
                        <label for="password"> {{ __('lang.new_password')}} </label>
                        <input type="password" name="password" id="password" class="form-control password" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="confirm_password"> {{ __('lang.confirm_password')}} </label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control confirm_password" required>
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
                $("#edit_form .id").val(id);              
                $("#editModal").modal();
            });            


            $("#edit_form .btn-submit").click(function(){
                let _token = $('input[name=_token]').val();
                let id = $('#id').val();                
                let password = $('#password').val();
                var confirm_password = $('#confirm_password').val();
               
                var form_data =new FormData();
            
                form_data.append("_token", _token);
                form_data.append("id", id);
                form_data.append("password", password);
                form_data.append("confirm_password", confirm_password);
              
                $.ajax({
                    url: "{{route('adminAccess.update')}}",
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
                                alert("Please Confirm the Password!");
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

