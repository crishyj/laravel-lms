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
                                <h4 class="page-title">{{ __('lang.assign_list')}}</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="adminList_table" class="table  w-100 text-center">
                                    <thead>
                                        <tr>    
                                            <th>{{ __('lang.assign_name')}}</th>                                        
                                            <th>{{ __('lang.video')}}</th>
                                            <th>{{ __('lang.attached')}}</th>
                                            <th>{{ __('lang.grade_name')}}</th>
                                            <th>{{ __('lang.class_name')}}</th>
                                            <th>{{ __('lang.course_name')}}</th>
                                           
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        @forelse($assignments as $assignment)
                                            @foreach ($courses as $item)
                                                @if ($item->id == $assignment->course_id)

                                                <tr>
                                                    <input type="hidden" name="id" class="id" value="{{$assignment->id}}" />  
                                                    <input type="hidden" name="grade_id" class="grade_id" value= "{{$assignment->grade_id}}"/>  
                                                    <input type="hidden" name="classes_id" class="classes_id" value="{{$assignment->classes_id}}"/>  
                                                    <input type="hidden" name="course_id" class="course_id" value="{{$assignment->course_id}}"/>
                                                    <input type="hidden" name="name" class="name" value="{{$assignment->name}}">
                                                    <input type="hidden" name="attach" class="attach" value="{{$assignment->attach}}">
                                                    <input type="hidden" name="video" class="video" value="{{$assignment->video}}">
                                                    <td>
                                                        {{$assignment->name}}
                                                    </td>
                                                    <td>
                                                        <a href="{{asset($assignment->video)}}" target="_blank"><i class="mdi mdi-video-box"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{asset($assignment->attach)}}" target="_blank"><i class="mdi mdi-file-document"></i></a>
                                                    </td>
                                                    <td>
                                                        @forelse($grades as $grade)
                                                            @php
                                                                if($grade->id == $assignment->grade_id){
                                                                    echo $grade->name;
                                                                } 
                                                            @endphp
                                                        @empty       
                                    
                                                        @endforelse   
                                                    </td>
                                                    <td>
                                                        @forelse($classes as $classe)
                                                            @php
                                                                if($assignment->classes_id == $classe->id){
                                                                    echo $classe->name;
                                                                } 
                                                            @endphp
                                                        @empty       
                                    
                                                        @endforelse 
                                                    </td>
                                                    <td>
                                                        @forelse($courses as $course)
                                                            @php
                                                                if($assignment->course_id == $course->id){
                                                                    echo $course->name;
                                                                } 
                                                            @endphp
                                                        @empty       
                                    
                                                        @endforelse 
                                                    </td>
                                                                          
                                                </tr>
                                                @endif
                                            @endforeach
                                          
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