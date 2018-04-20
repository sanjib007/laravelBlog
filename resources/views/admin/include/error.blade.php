@if(count($errors) > 0)
    @foreach($errors->all() as $error)

        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <strong><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error!</strong>
            {{$error}}
        </div>

    @endforeach
@endif