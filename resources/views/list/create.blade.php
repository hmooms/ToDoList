@extends('layouts.app')

@section('content')

<div class="container">       
    
    <div class="row justify-content-center">
       
        <div class="col-md-8">

            <div class="card">

                <div class="card-header text-center">Lijst aanmaken</div>

                <div class="card-body">

                    {!! Form::open(['action' => 'ListsController@store', 'method' => 'POST']) !!}

                        <div class="form-group">
                            
                            {{ Form::label('title', 'Titel:') }}

                            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titel', 'required' => 'required']) }}

                        </div>

                        @guest 

                            <p>Log in om je naam toe te voegen aan deze lijst.</p>

                        @else

                            <div class="form-group">
                                
                                {{ Form::label('user', 'Naam') }}

                                {{ Form::select('user', [$user->id => $user->name, null => 'Geen naam toevoegen'], $user->id,['class' => 'form-control']) }}

                            </div>

                        @endguest

                        {{ Form::submit('creëren', ['class' => 'btn btn-primary']) }}
                    
                        <a href={{ route('index')}} class="btn btn-danger">annuleren</a> 

                    {!! Form::close() !!}

                </div>

            </div>
        
        </div>

    </div>

</div>
@endsection