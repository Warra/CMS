<!DOCTYPE html>
<html>
<head>
  <title>Tags</title>
  {!! HTML::style('css/bootstrap.min.css') !!}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
  <table class="table table-hover table-bordered">
      <th>ID</th>
      <th>Name</th>
      <th>Update</th>
      <th>Delete</th>
    <tbody>
      @foreach ($tags as $tag)
        <tr>
          <td>
            {!! $tag->id !!}
          </td>
          <td>
            {!! $tag->name !!}    
          </td>
          <td>
            {!! Form::open(["url"=>action("TagController@updateShow", $tag->id)]) !!}
            {!! Form::submit("update") !!}
            {!! Form::close() !!}
          </td>
          <td>
            {!! Form::open(["url"=>action("TagController@delete", $tag->id)]) !!}
            {!! Form::submit("delete") !!}
            {!! Form::close() !!}
          </td>    
        </tr>
      @endforeach
    </tbody>
  </table>
  <a href="/articles" style="color:black;"><button>Go to Articles</button></a>
  <a href="/tags" style="color: black;"><button>Go to Tags</button></a>
</body>
</html>