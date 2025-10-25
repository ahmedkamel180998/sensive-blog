@extends('blog.master')
@section('title', 'Add a new blog post')

@section('content')
    @include('blog.partials.hero', ['title' => 'My Blogs'])

    <!-- ================ Create blog section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">

                    <!-- Go back navigation -->
                    <div class="mb-4">
                        <a href="{{ route('blog.index') }}" class="nav-link-form">Go Back</a>
                    </div>

                    @if (session('deleteBlogSuccess'))
                        <div style="font-size: 18px; border: 1px solid #ff9907; padding: 10px 20px; text-align: center; border-radius: 9px;">
                            {{ session('deleteBlogSuccess') }}
                        </div>
                    @elseif(session('deleteBlogFail'))
                        <div style="font-size: 18px; border: 1px solid #3b3a3a; color: red; padding: 10px 20px; text-align: center; border-radius: 9px;">
                            {{ session('deleteBlogSuccess') }}
                        </div>
                    @elseif (isset($blogs) && count($blogs) > 0)
                        <div class="table-responsive">
                            <table class="table-hover table-bordered table table-striped align-middle">
                                <thead>
                                <caption>
                                    My Blogs
                                </caption>
                                <tr class="table-primary text-dark">
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                @foreach ($blogs as $key => $blog)
                                    <tr class="{{$key % 2 === 0 ? '' : 'table-primary'}}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <a href="{{ route('blogs.show', ['blog' => $blog]) }}">{{ $blog->name }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('blogs.edit', ['blog' => $blog]) }}"
                                               class="btn btn-sm btn-primary mr-2">Edit</a>
                                            <form action="{{ route('blogs.destroy', ['blog' => $blog]) }}" method="POST"
                                                  style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            No blogs found.
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $blogs->render('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ Create blog section end ================= -->
@endsection
