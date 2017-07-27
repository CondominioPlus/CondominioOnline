<!-- Success messages -->

@if (session('success'))
    <div class="row">
        <div class="column">
            <div class="ui success message">
                <b>{{ session('success') }}</b>
            </div>
        </div>
    </div>
@elseif (session('error') )
    <div class="row">
        <div class="column">
            <div class="ui error message">
                <p>{{ session('error') }}</p>
            </div>
        </div>
    </div>
@elseif($errors->any())
    <div class="row">
        <div class="column">
            <div class="ui error message">
            <h3 clasS="header"> Verifica los Errores </h3>
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{$error}}</li>
                    @endforeach
                <p>{{ session('error') }}</p>
            </div>
        </div>
    </div>

@endif