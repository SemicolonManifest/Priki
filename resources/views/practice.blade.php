@extends('layout')

@section('content')

    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{{$practice->description}}</p>
                    </section>
                </article>

                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4"><textarea class="form-control" rows="3"
                                                         placeholder="Join the discussion and leave a comment!"></textarea>
                            </form>
                        @foreach($practice->opinions as $opinion)
                            <!-- Comment with nested comments-->
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle"
                                                                    src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                                                    alt="..."/>
                                    </div>
                                    <div class="ms-3 w-100">
                                        <a href="/user/{{$opinion->user->id}}/profile"><div class="fw-bold">{{$opinion->user->fullname}}</div></a>
                                        {{$opinion->id}} {{$opinion->user->id}}  {{$opinion->description}}


                                        <div class="mt-2 is-flex is-flex-direction-row justify-content-between">
                                            <div
                                                class="fw-light">{{\Carbon\Carbon::parse($opinion->created_at)->isoFormat("D MMMM YYYY") }}</div>
                                            <div class="fw-light"></div>
                                            <div class="mt-2 is-flex is-flex-direction-row">
                                                    <div class="mr-2">
                                                      {{$opinion->comments->count()}} {{__('practice.comments')}}
                                                    </div>
                                                    <div class="text-success mr-2">
                                                        <i class="fas fa-arrow-up"></i> {{$opinion->sumUpvotes()}}
                                                    </div>
                                                    <div class="text-danger">
                                                        <i class="fas fa-arrow-down"></i> {{$opinion->sumUpvotes()}}
                                                    </div>
                                                    <div>

                                                    </div>

                                            </div>
                                        </div>
                                        <!-- Child comment 1-->
                                        @foreach($opinion->comments as $commentUser)
                                            <div class="is-flex justify-content-between w-100">
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0"><img class="rounded-circle"
                                                                                    src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                                                                    alt="..."/></div>

                                                    <div class="ms-3">
                                                        <a href="/user/{{$commentUser->id}}/profile"><div class="fw-bold">{{$commentUser->fullname}}</div></a>
                                                        {{$commentUser->comment->comment}}
                                                    </div>
                                                </div>
                                                <div class="is-flex is-align-items-center">
                                                    @if($commentUser->comment->points == 1)
                                                        <i class="far fa-thumbs-up fa-2x"></i>
                                                    @endif
                                                    @if($commentUser->comment->points == 0)
                                                        <i class="far fa-meh fa-2x"></i>
                                                    @endif
                                                    @if($commentUser->comment->points == -1)
                                                        <i class="far fa-thumbs-down fa-2x"></i>
                                                    @endif
                                                </div>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Infos</div>
                    <div class="card-body">
                        <div class="row">
                            <table class="m-1 ml-3">
                                <tr>
                                    <td class="col-sm-6">{{__('practice.author')}}</td>
                                    <td class="col-sm-6">{{$practice->user->fullname}}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-6">{{__('practice.domain')}}</td>
                                    <td class="col-sm-6">{{$practice->domain->name}}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-6">{{__('practice.created_at')}}</td>
                                    <td class="col-sm-6">{{\Carbon\Carbon::parse($practice->created_at)->isoFormat("D MMMM YYYY") }}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-6">{{__('practice.updated_at')}}</td>
                                    <td class="col-sm-6">{{\Carbon\Carbon::parse($practice->updated_at)->isoFormat("D MMMM YYYY") }}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-6">{{__('practice.status')}}</td>
                                    <td class="col-sm-6">{{$practice->publicationState->name}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
