<!DOCTYPE html>
<html>
<head>
  <title>Articles</title>
  {{-- <link rel="stylesheet" href="public/css/bootstrap.min.css"/> --}}
  {!! HTML::style('css/bootstrap.min.css') !!}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
  <table class="table table-hover table-bordered">
      <th>id</th>
      <th>name</th>
      <th>description</th>
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
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>