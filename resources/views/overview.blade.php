@extends('layouts.app')

@section('content')

<div class="container">       

    @if(sizeof($tdlists) > 0)

            <div class="row justify-content-left">

                @foreach($tdlists as $tdlist)
                    <div class="col-md-4">

                        <div class="card">
                            <div class="card-header text-center">{{$tdlist->title}}</div>

                            <div class="card-body">
                                
                                @foreach($tasks->where('list_id', $tdlist->id) as $task)

                                    <div class="card">
                                    
                                        <div class="card-body">

                                            <p>{{$task->description}}</p>

                                            <p>duur: {{$task->minutes}} minuten</p>
                                                                                
                                        </div>                                    

                                        <div class="card-footer">status: {{$task->status}}</div>
                                        
                                    </div>


                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
            <div class="row justify-content-center">
            <h1>Er zijn geen lijsten.</h1>
            </div>
            @endif
            <div class="row justify-content-left">
                <div class="col-md-4">

                        <div class="card">

                            <div class="card-header text-center">lijst toevoegen</div>

                            <div class="card-body">
                            
                            <a href="{{ route('create')}} "><img src="{{ asset('plus.svg') }}" alt="My SVG Icon"></a>
                            
                            </div>

                        </div>
                </div>
    </div>
</div>

@endsection