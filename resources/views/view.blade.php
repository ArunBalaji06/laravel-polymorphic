<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post View</title>

     <!-- BootStrap CDN -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body><br />
    <div class="row"><br />
        <h2 class="text-center col-md-10">Polymorphic relationship</h2><br />
        <a href="{{url('/')}}/" class="btn btn-secondary col-md-1">Form</a>
    </div>
    <div class="col-md-12 row">
        <div class="col-md-6">
            <h3 class="text-center">Post table</h2>

            <table class="table table-hover container">
                <thead>
                    <td>Post</td>
                    <td>Content</td>
                    <td>Comment</td>
                </thead>
                @foreach($posts as $post)
                <tbody>
                    
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$post->id}}">
                            add comment
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modal{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="/add-comment">
                                                @csrf
                                                <label>Comment</label>
                                                <input type="text" name="comment" class="form-control">
                                                <input type="hidden" name="post_id" value="{{$post->id}}"><br />
                                                <button type="submit" class="btn btn-primary">Save changes</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="col-md-6">
            <h3 class="text-center">Page table</h2>
            <table class="table table-hover container">
                <thead>
                    <td>Page</td>
                    <td>Comment</td>
                </thead>
                @foreach($pages as $page)
                <tbody>
                    
                        <td>{{ $page->title }}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalpage{{$page->id}}">
                            add comment
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalpage{{$page->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="/add-comment">
                                                @csrf
                                                <label>Comment</label>
                                                <input type="text" name="comment" class="form-control">
                                                <input type="hidden" name="page_id" value="{{$page->id}}"><br />
                                                <button type="submit" class="btn btn-primary">Save changes</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

    <br /><br />

    @if(isset($comments))
        <table class="table table-hover container">
            <thead>
                    <td>Title</td>
                    <td>Comment</td>
            </thead>
            @foreach($comments as $comment)
            <tbody>
                <td>{{$comment->commentable->title}}</td>
                <td>{{$comment->content}}</td>
            </tbody>
            @endforeach
    @endif
    
</body>
</html>