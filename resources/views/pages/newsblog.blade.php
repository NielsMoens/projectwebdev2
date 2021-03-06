@extends('layout')

@section('content')
<!-- Blog page Content -->
<div class=" container">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
        <h1 class="my-4">
            <br>
        </h1>
        @foreach ($newsblogContent as $nwsContent)
            <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{!!$nwsContent->{"posttitle_".App::getLocale()}!!}</h2>
                    <p class="card-text">{!!$nwsContent->{"postcontent_".App::getLocale()}!!}</p>
                    <a href="{{url(App::getLocale().'/newsblog', $nwsContent->id)}}">
                        @csrf
                        <input type="hidden" name="" value="">
                        <button class="btn-success">
                            {{__('home.details')}}
                        </button>
                    </a>
                </div>
                <div class="card-footer text-muted">
                    {{__('home.postedon')}} {{$nwsContent->postdate}}
                </div>
            </div>
        @endforeach
    </div>
    
</div>

    @endsection
