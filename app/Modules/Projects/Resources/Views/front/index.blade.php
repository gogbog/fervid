@extends('layouts.app')

@section('title', 'Projects')

@php
    $placeholder = \Charlotte\Administration\Helpers\Settings::getFile('projects_header');
@endphp

@section('content')

    <div class="page">
        <section class="page-header">

            <div class="page-header-title">
                <span>Welcome to <span class="fancy-text">Fervid Group Limited</span></span>
            </div>

            <div class="page-header-show">
                @if($placeholder)
                    <img src="{{$placeholder}}"
                         alt="{{ config('app.name', 'Fervid') }}"
                         class="page-header-show-img">
                @else
                    <img src="{{asset('/img/fervid_full_logo.svg')}}"
                         alt="{{ config('app.name', 'Fervid') }}"
                         class="page-header-show-img">
                @endif
            </div>

        </section>

        <section class="page-text-separator">
            @if(\Charlotte\Administration\Helpers\StaticBlock::get('project_block_1'))
                <div class="page-text-separator-content" data-aos="fade-in" data-aos-duration="750">
                    {!! \Charlotte\Administration\Helpers\StaticBlock::get('project_block_1') !!}
                </div>
            @endif
        </section>

        <section class="projects">
            @php
                $static_block_index = 2;
                $projects_left = $projects->count() - 1;
                $full_width = false;
                $left_after_last =0;
            @endphp
            @foreach($projects as $project)
                @php
                    if ($projects->count() > 5 && ($projects_left == 0 && $left_after_last % 5 != 0 && $left_after_last % 2 != 0 )) {
                        $full_width = true;
                    }

                    if ($projects->count() < 4 && $loop->iteration == 3) {
                        $full_width = true;
                    }

                    if ($loop->count == 1) {
                        $full_width = true;
                    }

                    if ($loop->iteration % 5 == 0) {
                        $full_width = true;
                        $left_after_last = $projects_left;
                    }
                @endphp
                <div
                    class="projects-item {{($full_width) ? 'panorama' : ''}}"
                    data-aos="fade-in" data-aos-duration="750">
                    <div class="projects-item-img-container">
                        <a href="{{  route('projects.view', [$project->slug]) }}" class="redirect">
                            @if($project->getMedia()->isNotEmpty())
                                <img src="{{$project->getMedia()[0]->getUrl('big')}}" alt="{{$project->title}}">
                            @else
                                <img src="{{asset('/img/fervid_full_logo.svg')}}" alt="{{$project->title}}">
                            @endif
                        </a>
                    </div>
                    <div class="projects-item-caption">
                        <p class="projects-item-caption-text">
                            {{$project->title}}
                        </p>
                    </div>
                </div>

                @if($loop->count > 1 && $loop->iteration % 5 == 0)
                    <section class="page-text-separator">
                        @if(\Charlotte\Administration\Helpers\StaticBlock::get('project_block_'.$static_block_index))
                            <div class="page-text-separator-content" data-aos="fade-in" data-aos-duration="750">
                                {!! \Charlotte\Administration\Helpers\StaticBlock::get('project_block_'.$static_block_index) !!}
                            </div>
                        @endif
                    </section>
                    @php
                        $static_block_index++;
                    @endphp
                @endif
                @php
                    $projects_left--;
                    $full_width = false;
                @endphp
            @endforeach
        </section>

    </div>


@endsection
