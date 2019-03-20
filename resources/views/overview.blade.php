@extends('layouts.app')

@section('content')

@include('inc.sort')

<div class="container">

    @if(sizeof($tdlists) > 0)

        <div class="row justify-content-left">

            @foreach($tdlists as $tdlist)
                
                <div class="col-md-4">

                    <div class="card">
                        
                        <div class="card-header text-center">

                            @guest()

                                @if($tdlist->user_id == null)

                                    {!!Form::open(['action' => ['ListsController@destroy', $tdlist->id], 'method' => 'POST', 'onSubmit' => 'return confirmDelete("list")'])!!}

                                        {{Form::hidden('_method', 'DELETE')}}

                                        {{Form::submit('X', ['class' => 'btn-danger', 'style' => 'float:left'])}}

                                    {!!Form::close()!!}
                                
                                    <a href="{{ route('list.edit', ['list' => $tdlist->id] )}} "><img src="{{ asset('edit.png') }}" alt="edit" style="float:right"></a>
                                
                                @endif

                            @elseif($tdlist->user_id != null && Auth::user()->id == $tdlist->user_id || $tdlist->user_id == null)
                                
                                {!!Form::open(['action' => ['ListsController@destroy', $tdlist->id], 'method' => 'POST', 'onSubmit' => 'return confirmDelete("list")'])!!}

                                    {{Form::hidden('_method', 'DELETE')}}

                                    {{Form::submit('X', ['class' => 'btn-danger', 'style' => 'float:left'])}}

                                {!!Form::close()!!}

                                <a href="{{ route('list.edit', ['list' => $tdlist->id])}} "><img src="{{ asset('edit.png') }}" alt="edit" style="float:right"></a>

                            @endif

                            {{$tdlist->title}}

                        </div>

                        <div class="card-body" id="list{{$tdlist->id}}">
                            
                            @foreach($tasks->where('list_id', $tdlist->id) as $task)

                                <div class="card task">

                                    <div class="card-header text-center">

                                        @guest()

                                            @if($tdlist->user_id == null)

                                                {!!Form::open(['action' => ['TasksController@destroy', $task->id], 'method' => 'POST', 'onSubmit' => 'return confirmDelete("task")'])!!}

                                                    {{Form::hidden('_method', 'DELETE')}}

                                                    {{Form::submit('X', ['class' => 'btn-danger', 'style' => 'float:left'])}}

                                                {!!Form::close()!!}

                                                <a href="{{ route('task.edit', ['list' => $tdlist->id, 'task' => $task->id] )}} "><img src="{{ asset('edit.png') }}" alt="edit" style="float:right"></a>

                                            @endif

                                            @elseif($tdlist->user_id != null && Auth::user()->id == $tdlist->user_id || $tdlist->user_id == null)

                                                {!!Form::open(['action' => ['TasksController@destroy', $task->id], 'method' => 'POST', 'onSubmit' => 'return confirmDelete("task")'])!!}

                                                    {{Form::hidden('_method', 'DELETE')}}

                                                    {{Form::submit('X', ['class' => 'btn-danger', 'style' => 'float:left'])}}

                                                {!!Form::close()!!}

                                                <a href="{{ route('task.edit', ['list' => $tdlist->id, 'task' => $task->id] )}} "><img src="{{ asset('edit.png') }}" alt="edit" style="float:right"></a>

                                            @endif

                                        {{$task->title}}
                                        
                                    </div>
                                
                                    <div class="card-body">

                                        <p>{{$task->description}}</p>

                                        <hr>  

                                        <p>duur: {{$task->minutes}} minuten</p>                          

                                        status: <div id="status">{{$task->status}}</div>

                                    </div>
                                    
                                </div>


                            @endforeach

                            <div class="card">

                                <div class="card-header text-center">Taak toevoegen</div>
                                
                                <div class="card-body text-center">

                                    <a href="{{ route('task.create', ['list' => $tdlist->id])}} "><img src="{{ asset('add.png') }}" alt="+"></a>

                                </div>
                                
                            </div>
                            
                        </div>

                        @if($tdlist->user_id != null)
                        
                            <div class="text-center">

                                Lijst is toegevoegd door {{$users[$tdlist->user_id - 1]->name}}

                            </div>

                        @endif                            
                        
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
                
                    <a href="{{ route('list.create')}} "><img src="{{ asset('plus.svg') }}" alt="+"></a>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

    function confirmDelete(deleted)
    {
        var result = confirm((deleted == 'list') ? 'Weet u zeker dat u deze lijst wilt verwijderen?' : 'Weet u zeker dat u deze taak wilt verwijderen?');

        if(result)
            return true;
        else 
            return false;
    }
        
    // document.getElementById('sort').onclick = function(){sortList()};

    // function sortList(){

    //     var selectList = document.getElementById("select-list").selectedIndex;
    //     var selectedList = selectList.options[selectList.selectedIndex].value;

    //     alert(selectedList); 

    // }


</script>
@endsection