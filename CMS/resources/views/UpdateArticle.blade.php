<!DOCTYPE html>
<html>
<head>
  <title>Articles</title>
  {{-- <link rel='stylesheet' href='public/css/bootstrap.min.css'/> --}}
  {!! HTML::style('css/bootstrap.min.css') !!}
  {!! HTML::style('css/main.css') !!}

  <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
</head>
<body>
  <div class="col-md-8">
    <div class="form-group form-whole">
      {!! Form::open(["url"=>action("ArticleController@update", $article->id)]) !!}
        {!! Form::label('name', 'ID') !!}
        {!! Form::text('id', $article->id, ["class" => "form-control", "disabled" => "disabled"])!!} <br />
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', $article->name, ["class" => "form-control"])!!} <br />
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', $article->description, ["class" => "form-control"])!!} <br />
        {!! Form::submit('submit changes', ["class" => "btn btn-default"]) !!}
      {!! Form::close() !!}    
    </div>
  </div>
</body>
</html>