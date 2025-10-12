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
                        <a href="{{ route('blogs.index') }}" class="nav-link-form">Go Back</a>
                    </div>

                    @if (isset($blogs) && count($blogs) > 0)
                        <div class="table-responsive">
                            <table class="table-striped table-hover table-borderless table-primary table align-middle">
                                <thead class="table-light">
                                    <caption>
                                        My Blogs
                                    </caption>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($blogs as $key => $blog)
                                        <tr class="table-primary">
                                            <td scope="row">{{ $key + 1 }}</td>
                                            <td>
                                                <a href="{{ route('blogs.show', ['blog' => $blog]) }}">{{ $blog->name }}</a>
                                            </td>
                                            <td>Do Something</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
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
