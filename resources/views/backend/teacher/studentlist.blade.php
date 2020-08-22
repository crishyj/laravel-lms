@extends('layouts/backMain')
@extends('layouts/directorSide')

@section('content')

<div class="content-page">
    <div class="content">
       <div class="container-fluid">

            <div class="row">               
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                           
                            <div class="page-title-box">                   
                                <h4 class="page-title">{{ __('lang.student_list')}}</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="adminList_table" class="table  w-100 text-center">
                                    <thead>
                                        <tr>    
                                            <th>{{ __('lang.grade_name')}}</th>
                                            <th>{{ __('lang.class_name')}}</th>                                        
                                            <th>{{ __('lang.first_name')}}</th>
                                            <th>{{ __('lang.last_name')}}</th>
                                            <th>{{ __('lang.middle_name')}}</th>
                                            <th>{{ __('lang.email')}}</th>
                                            <th>{{ __('lang.birthday')}}</th>
                                            <th>{{ __('lang.address')}}</th>
                                            <th>{{ __('lang.last_school')}}</th>
                                            <th>{{ __('lang.last_grade')}}</th>
                                            <th>{{ __('lang.phone')}}</th>
                                            <th>{{ __('lang.profile_image')}}</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($students as $option)
                                            <tr>          
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
                                                  
                                                <td>
                                                    @forelse($classes as $classe)
                                                        @php
                                                            if($classe->id == $option->classes_id){
                                                                echo $classe->name;
                                                            } 
                                                        @endphp
                                                    @empty       
                                
                                                    @endforelse 
                                                </td>                                     
                                                <td>{{ $option->first_name }}</td>
                                                <td>{{ $option->last_name }}</td>
                                                <td>{{ $option->middle_name }}</td>
                                                <td>{{ $option->email }}</td>
                                                <td>{{ $option->birthday }}</td>
                                                <td>{{ $option->address }}</td>                                                
                                                <td>{{ $option->last_school }}</td>
                                                <td>{{ $option->last_grade }}</td>
                                                <td>{{ $option->phone }}</td>
                                              
                                                <td><img src = {{asset($option->profile_image)}} width = 50px> </td> 
                                                                      
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
