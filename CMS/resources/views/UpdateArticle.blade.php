<!DOCTYPE html>
<html>
<head>
  <title>Articles</title>
  {!! HTML::style('css/bootstrap.min.css') !!}
  {!! HTML::style('css/main.css') !!}
  {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.bootstrap3.min.css') !!}

  {!! HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js') !!}
  {!! HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js') !!}
  {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js') !!}
  {!! HTML::script('main.js') !!}
  
</head>
<body>
  <div class='col-md-8'>
    <div class='form-group form-whole'>
      {!! Form::open(['url'=>action('ArticleController@update', $article->id)]) !!}
        {!! Form::label('name', 'ID') !!}
        {!! Form::text('id', $article->id, ['class' => 'form-control', 'disabled' => 'disabled'])!!} <br />
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', $article->name, ['class' => 'form-control'])!!} <br />
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', $article->description, ['class' => 'form-control'])!!} <br />
        {!! Form::label('tags', 'Tags') !!}
        {!! Form::text('tags', $article->setTagsString(), ['id' => 'tags', 'class' => 'demo-default selectized' ]) !!}
        {{-- <input type='text' id='tags' name='tags' class='demo-default selectized'></input> --}}
        {!! Form::submit('submit changes', ['class' => 'btn btn-default']) !!}
      {!! Form::close() !!}    
    </div>
  </div>
</body>
<script>
  $(document).ready(function(){
      $('#tags').selectize();
  });
</script>
</html>