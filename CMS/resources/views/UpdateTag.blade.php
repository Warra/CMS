<!DOCTYPE html>
<html>
<head>
  <title>Tag</title>
  {!! HTML::style('css/bootstrap.min.css') !!}
  {!! HTML::style('css/main.css') !!}

  <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
</head>
<body>
  <div class="col-md-8">
    <div class="form-group form-whole">
      {!! Form::open(["url"=>action("TagController@update", $tag->id)]) !!}
        {!! Form::label('name', 'ID') !!}
        {!! Form::text('id', $tag->id, ["class" => "form-control", "disabled" => "disabled"])!!} <br />
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', $tag->name, ["class" => "form-control"])!!} <br />
        {!! Form::submit('submit changes', ["class" => "btn btn-default"]) !!}
      {!! Form::close() !!}    
    </div>
  </div>
</body>
</html>