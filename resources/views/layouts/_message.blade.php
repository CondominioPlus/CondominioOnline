<!-- Success messages -->

@if (session('success'))
    <div class="row">
        <div class="column">
            <div class="ui success message">
                <b>{{ session('success') }}</b>
            </div>
        </div>
    </div>
@elseif (session('error'))
    <div class="row">
        <div class="column">
            <div class="ui error message">
                <p>{{ session('error') }}</p>
            </div>
        </div>
    </div>
@else
@endif