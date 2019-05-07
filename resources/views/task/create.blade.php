@extends('layouts.app')

@section('content')

<div class="container">       
    
    <div class="row justify-content-center">
       
        <div class="col-md-8">

            <div class="card">

                <div class="card-header text-center">Taak aanmaken</div>

                <div class="card-body">

                    {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST']) !!}

                        <div class="form-group">
                            
                            {{ Form::label('title', 'Titel:') }}

                            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titel', 'required' => 'required']) }}

                        </div>

                        <div class="form-group">
                            
                            {{ Form::label('description', 'Beschrijving:') }}

                            {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Beschrijving', 'required' => 'required', 'rows' => '3']) }}

                        </div>

                        <div class="form-group">
                            
                            {{ Form::label('minutes', 'Minuten:') }}

                            {{ Form::number('minutes', '', ['class' => 'form-control', 'placeholder' => '60', 'required' => 'required', 'max' => '1440']) }}

                        </div>

                        <div class="form-group">
                            
                            {{ Form::label('status', 'Status:') }}

                            {{ Form::select('status', ['0' => 'Nog niet begonnen', '1' => 'Mee bezig', '2' => 'Klaar'], '0', ['class' => 'form-control', 'required' => 'required']) }}

                        </div>

                        {{ Form::hidden('list_id', $list->id) }}


                        {{ Form::submit('creëren', ['class' => 'btn btn-primary']) }}
                    
                        <a href={{ route('index')}} class="btn btn-danger">annuleren</a> 

                    {!! Form::close() !!}

                </div>

            </div>
        
        </div>

    </div>

</div>
@endsection