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
                                <h4 class="page-title">{{ __('lang.payment_status')}}</h4>
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
                                            <th>{{ __('lang.payment_status')}}</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                       
                                            <tr>
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
                                                    {{$grade->name}}
                                                </td>
                                                <td>
                                                    {{$classes->name}}
                                                </td>
                                                <td>
                                                    {{$student->payment}}
                                                </td>
                                            </tr>
                                       
                                       
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