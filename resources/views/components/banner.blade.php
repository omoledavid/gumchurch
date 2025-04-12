@props([
    'pageName'
])
<div class="page-header" data-background="{{asset('gum/images/gum-banner.png')}}">
    <div class="container">
        <div class="row">
            <h1 class="mb-2 text-white">{{$pageName}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$pageName}}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
