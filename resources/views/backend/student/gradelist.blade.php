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
                                <h4 class="page-title">{{ __('lang.grade_list')}}</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="adminList_table" class="table  w-100 text-center">
                                    <thead>
                                        <tr>    
                                            <th>{{ __('lang.assign_name')}}</th>                                        
                                            <th>{{ __('lang.score')}}</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($scores as $item)   
                                            <tr>
                                                <td>
                                                    {{$item->assignment->name}}
                                                </td>
                                                <td>
                                                    {{$item->score}}
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