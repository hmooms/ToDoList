
<div class="sidenav">

    <div class="container">
    
        <div class="row justify-content-center">

            <div class="col-md-12">

                <h2>Lijst sorteren</h2>

                <hr>
                <div class="form-group">

                    <label for="list">Selecteer welke lijst u wilt sorteren:</label>

                    <select class="form-control" name="list" id="select-list">
                    
                        @foreach($tdlists as $tdlist)

                            <option value="{{$tdlist->id}}">{{$tdlist->title}}</option>

                        @endforeach
                    
                    </select>

                </div>

                <div class="form-group">

                    <label for="task">Selecteer waar u het op wil sorteren:</label>

                    <select class="form-control" name="task" id="select-task">
                        
                        <option value="status">Status</option>

                        <option value="minutes">Duur</option>

                    </select>

                </div>

                <button id="sort" class="btn btn-primary">Sorteer</button>

            </div>
        
        </div>    
    
    </div>

</div>