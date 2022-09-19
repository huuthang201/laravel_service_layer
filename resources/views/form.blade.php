{!! Form::open(array('route' => 'event', 'class' => '')) !!}
    <div>
        <label  class="email">Your name</label>
            {!! Form::text('name', null, ['class' => 'input-text', 'placeholder'=>"Your name"]) !!}
    </div>
    <div>
        <label  class="email">Your email</label>
            {!! Form::text('email', null, ['class' => 'input-text', 'placeholder'=>"Your email"]) !!}
    </div>
    <div>
        <label class="email">Comments</label>
            {!! Form::textarea('comment', null, ['class' => 'tarea', 'rows'=>"5"]) !!}
    </div>
    <div class="send">
        {!! Form::submit('Send', ['class' => 'button']) !!}
    </div>
{!! Form::close() !!}