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
                                <h4 class="page-title">{{ __('lang.class_list')}}</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="adminList_table" class="table  w-100 text-center">
                                    <thead>
                                        <tr>    
                                            <th>{{ __('lang.grade_name')}}</th>
                                            <th>{{ __('lang.class_name')}}</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($classes as $classe)
                                            <tr>
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
                                                <td>
                                                   {{$classe->name}}
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
