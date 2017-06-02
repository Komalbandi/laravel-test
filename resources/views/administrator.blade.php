<!DOCTYPE html>
<html lang="en">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
    <meta charset="UTF-8">
    <title>{{$title}}}</title>
</head>
<body>
<div class="container">

    @if (count($blogs) > 0)
        @foreach ($blogs as $blog)
            @if ($blog->active==1)
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p>Title: {{$blog->title}}</p>
                        <p>Body: {{$blog->body}}</p>
                        <p>Published time: {{$blog->body}}</p>
                        <p>Author's name: {{$blog->name}}</p>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p>No one has blogged!</p>
            </div>
        </div>
    @endif


</div>
</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>