<!DOCTYPE html>
<html>
<head>
  <title>Articles</title>
  {!! HTML::style('css/bootstrap.min.css') !!}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
  <table class="table table-hover table-bordered">
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Update</th>
      <th>Delete</th>
    <tbody>
      @foreach ($articles as $article)
        <tr>
          <td>
            {!! $article->id !!}
          </td>
          <td>
            {!! $article->name !!}    
          </td>
          <td>
            {!! $article->description !!}    
          </td>
          <td>
            {!! Form::open(["url"=>action("ArticleController@updateShow", $article->id)]) !!}
            {!! Form::submit("update") !!}
            {!! Form::close() !!}
          </td>
          <td>
            {!! Form::open(["url"=>action("ArticleController@delete", $article->id)]) !!}
            {!! Form::submit("delete") !!}
            {!! Form::close() !!}
          </td>    
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>