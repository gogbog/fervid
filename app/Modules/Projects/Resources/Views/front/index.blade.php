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
            <p class="page-text-separator-content" data-aos="fade-in" data-aos-duration="350">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, architecto aspernatur commodi
                dignissimos, distinctio dolores enim est eum exercitationem fugit illum laudantium maiores maxime minima
                molestias necessitatibus nesciunt nisi numquam placeat porro quas quo sed ullam voluptatem, voluptatum!
                Asperiores commodi facilis id ipsa laborum mollitia nemo nisi pariatur perspiciatis, quod quos sit
                veniam! Ad aliquid aperiam asperiores autem cum delectus eum facilis fugit hic iste nemo nisi numquam
                optio provident quos repudiandae ullam, unde voluptatem. Ad amet asperiores distinctio error natus
                recusandae reiciendis sunt. Aut consectetur dicta, doloremque ducimus facilis itaque minus officiis quia
                reprehenderit rerum sit suscipit, temporibus unde.
            </p>
        </section>

        <section class="projects">
            @foreach($projects as $project)
                <div
                    class="projects-item {{(($loop->count == 1 && $loop->iteration == 1) || ($loop->count < 4 && $loop->iteration == 3) || ($loop->count >= 5 && $loop->iteration % 5 == 0)) ? 'panorama' : ''}}"
                    data-aos="zoom-in" data-aos-duration="350">
                    <div class="projects-item-img-container">
                        <a href="{{  route('projects.view', [$project->id]) }}" class="redirect">
                            @if($project->getMedia()->isNotEmpty())
                                <img src="{{$project->getMedia()[0]->getUrl('big')}}" alt="{{$project->title}}">
                            @else
                                <img src="{{asset('/img/fervid_full_logo.svg')}}" alt="{{$project->title}}">
                            @endif
                        </a>
                    </div>
                    <div class="projects-item-caption">
                        <p class="projects-item-caption-text">
                            <a href="{{ route('projects.view', [$project->id]) }}" class="redirect">
                                {{$project->title}}
                            </a>
                        </p>
                    </div>
                </div>
            @endforeach
        </section>

        <section class="page-text-separator">
            <p class="page-text-separator-content" data-aos="fade-in" data-aos-duration="350">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, architecto aspernatur commodi
                dignissimos, distinctio dolores enim est eum exercitationem fugit illum laudantium maiores maxime minima
                molestias necessitatibus nesciunt nisi numquam placeat porro quas quo sed ullam voluptatem, voluptatum!
                Asperiores commodi facilis id ipsa laborum mollitia nemo nisi pariatur perspiciatis, quod quos sit
                veniam! Ad aliquid aperiam asperiores autem cum delectus eum facilis fugit hic iste nemo nisi numquam
                optio provident quos repudiandae ullam, unde voluptatem. Ad amet asperiores distinctio error natus
                recusandae reiciendis sunt. Aut consectetur dicta, doloremque ducimus facilis itaque minus officiis quia
                reprehenderit rerum sit suscipit, temporibus unde.
            </p>
        </section>

        <section class="projects">
            <div class="projects-item" data-aos="zoom-in" data-aos-duration="350">
                <div class="projects-item-img-container">
                    <img src="/img/fervid_logo_light.svg" alt="test1">
                </div>
                <div class="projects-item-caption">
                    <p class="projects-item-caption-text">
                        Lorem ipsum dolor1.
                    </p>
                </div>
            </div>
            <div class="projects-item">
                <div class="projects-item-img-container" data-aos="zoom-in" data-aos-duration="350">
                    <img src="/img/fervid_logo_light.svg" alt="test2">
                </div>
                <div class="projects-item-caption">
                    <p class="projects-item-caption-text">
                        Lorem ipsum dolor2.
                    </p>
                </div>
            </div>
            <div class="projects-item">
                <div class="projects-item-img-container" data-aos="zoom-in" data-aos-duration="350">
                    <img src="/img/fervid_logo_light.svg" alt="test1">
                </div>
                <div class="projects-item-caption">
                    <p class="projects-item-caption-text">
                        Lorem ipsum dolor3.
                    </p>
                </div>
            </div>

            <div class="projects-item">
                <div class="projects-item-img-container" data-aos="zoom-in" data-aos-duration="350">
                    <img src="/img/fervid_logo_light.svg" alt="test1">
                </div>
                <div class="projects-item-caption">
                    <p class="projects-item-caption-text">
                        Lorem ipsum dolor4.
                    </p>
                </div>
            </div>
            <div class="projects-item panorama" data-aos="zoom-in" data-aos-duration="350">
                <div class="projects-item-img-container">
                    <img src="/img/fervid_logo_light.svg" alt="test1">
                </div>
                <div class="projects-item-caption">
                    <p class="projects-item-caption-text">
                        Lorem ipsum dolor5.
                    </p>
                </div>
            </div>
        </section>

        <section class="page-text-separator">
            <p class="page-text-separator-content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, architecto aspernatur commodi
                dignissimos, distinctio dolores enim est eum exercitationem fugit illum laudantium maiores maxime minima
                molestias necessitatibus nesciunt nisi numquam placeat porro quas quo sed ullam voluptatem, voluptatum!
                Asperiores commodi facilis id ipsa laborum mollitia nemo nisi pariatur perspiciatis, quod quos sit
                veniam! Ad aliquid aperiam asperiores autem cum delectus eum facilis fugit hic iste nemo nisi numquam
                optio provident quos repudiandae ullam, unde voluptatem. Ad amet asperiores distinctio error natus
                recusandae reiciendis sunt. Aut consectetur dicta, doloremque ducimus facilis itaque minus officiis quia
                reprehenderit rerum sit suscipit, temporibus unde.
            </p>
        </section>
    </div>


@endsection
