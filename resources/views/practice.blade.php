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
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."/>
                                </div>
                                <div class="ms-3">
                                    <div class="fw-bold">{{$opinion->user->fullname}}</div>
                                    {{$opinion->description}}


                                    <div class="fw-light mt-2">{{\Carbon\Carbon::parse($opinion->created_at)->isoFormat("D MMMM YYYY") }}</div>
                                    <!-- Child comment 1-->
                                    <div class="d-flex mt-4 is-hidden">
                                        <div class="flex-shrink-0"><img class="rounded-circle"
                                                                        src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                                                        alt="..."/></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            And under those conditions, you cannot establish a capital-market evaluation
                                            of that enterprise. You can't get investors.
                                        </div>
                                    </div>


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
