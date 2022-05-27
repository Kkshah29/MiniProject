@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('posts.create') }}"  class="btn btn-primary">Add Post</a>
    </div>
    <div class="card">
        <div class="card-header">Posts</div>

        <div class="card-body">
            @if($posts->count()>0)
            <table class="table table-bordered">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Auther</th>
                    <th>Category</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{asset('storage/'.$post->image)}}" alt="Post Image" width="128"></td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->excerpt}}</td>
                            <td>{{$post->author->name}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>
                                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm"
                                    onclick="displayModalForm({{ $post}})"
                                   data-toggle="modal"
                                   data-target="#deleteModal">Trash</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h5>Nothing TO show</h5>
            @endif
        </div>
        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    </div>
    <!--DELETE MODAL-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Are you sure want to delete Post??</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Trash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END DELETE MODAL-->
@endsection

@section('page-level-scripts')
    <script type="text/javascript">
        function displayModalForm($post) {
            var url = '/trash/' + $post.id;
            $("#deleteForm").attr('action', url);
        }
    </script>
@endsection
