@extends('layouts.app')

@if(!empty($project))
    @section('title', $project->title)
@endif

@section('content')

    @if(!empty($project))
        <div class="page">
            <section class="page-view-header">
                @if($project->getMedia()->isNotEmpty())
                    <img src="{{$project->getMedia()[0]->getUrl('big')}}"
                         alt="{{$project->title}}"
                         class="page-view-header-img rellax">
                @else
                    <img src="{{asset('/img/fervid_full_logo.svg')}}"
                         alt="{{$project->title}}"
                         class="page-view-header-img rellax">
                @endif
            </section>
            <section class="page-view-content">
                <p class="page-view-content-title">
                    {{$project->title}}
                </p>
                <div class="page-view-content-description">
                    {!! $project->description !!}
                </div>
                @if($project->getMedia('project_images')->isNotEmpty())
                    <div class="page-view-content-gallery {{$project->getMedia('project_images')->count() < 2 ? 'disabled' : ''}}">
                        <div class="page-view-content-gallery-container glide {{$project->getMedia('project_images')->count() < 2 ? 'non-slide-able' : ''}}">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    @foreach($project->getMedia('project_images') as $media)
                                        <li class="glide__slide">
                                            @if(!empty($media))
                                                <img src="{{ $media->getUrl('big') }}"
                                                     alt="{{$project->title}}">
                                            @else
                                                <img src="{{ asset('/img/built_robotics_AX_162_15.144e3ff4.jpg') }}"
                                                     alt="{{$project->title}}">
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="glide__bullets" data-glide-el="controls[nav]">
                                @foreach($project->getMedia('project_images') as $media)
                                    @if($loop->count > 1)
                                        <button class="glide__bullet" data-glide-dir="={{$loop->index}}"></button>
                                    @endif
                                @endforeach
                            </div>
                            @if($project->getMedia('project_images')->count() > 1)
                                <div class="glide__arrows" data-glide-el="controls">
                                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </section>
        </div>
    @else
        <div class="page">
            <div class="not-found">
                404
            </div>
        </div>
    @endif

@endsection
