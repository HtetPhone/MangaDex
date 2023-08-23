@extends('layouts.master')


@section('content')
    <div class="row mt-5">
        <div class="col-12 col-md-9">
            <div class="row justify-content-center flex-wrap">
                <div class="col-6 col-md-3">
                    <div class="card border-0">
                        <div class="text-center">
                            <img src="{{ asset('img/sample.jpg') }}" alt="img" class="w-100  ">
                        </div>
                        <div class="mt-2">
                            <h5 class="fw-semibold ">The Villainous Desciple</h5>
                            <div class="d-flex justify-content-between flex-wrap mb-1">
                                <a href=""
                                    class="text-decoration-none text-white bg-secondary rounded-pill py-0 px-2">Chapter
                                    5</a>
                                <span class=" fs-6">5 mins ago</span>
                            </div>
                            <div class="d-flex justify-content-between flex-wrap mb-1">
                                <a href=""
                                    class="text-decoration-none text-white bg-secondary rounded-pill py-0 px-2">Chapter
                                    4</a>
                                <span class=" fs-6">4 mins ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card border-0">
                        <div class="text-center">
                            <img src="{{ asset('img/sample.jpg') }}" alt="img" class="w-100  ">
                        </div>
                        <div class="mt-2">
                            <h5 class="fw-semibold ">The Villainous Desciple</h5>
                            <div class="d-flex justify-content-between flex-wrap mb-1">
                                <a href=""
                                    class="text-decoration-none text-white bg-secondary rounded-pill py-0 px-2">Chapter
                                    5</a>
                                <span class=" fs-6">5 mins ago</span>
                            </div>
                            <div class="d-flex justify-content-between flex-wrap mb-1">
                                <a href=""
                                    class="text-decoration-none text-white bg-secondary rounded-pill py-0 px-2">Chapter
                                    4</a>
                                <span class=" fs-6">4 mins ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">dfg</div>
                <div class="col-6 col-md-3">gdfg</div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <h4 class="fw-semibold">Manga Hot</h4>
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="d-flex align-items-start border-0">
                        <img src="{{ asset('img/sample.jpg') }}" alt="img" style="width: 80px">
                        <div class="ms-2">
                            <p class="fw-semibold mb-1">The Villainous Desciple</p>
                            <div class="d-flex justify-content-between flex-wrap mb-2">
                                <a href=""
                                    class="text-decoration-none text-white fs-6 bg-secondary rounded-pill px-1">Chapter
                                    5</a>
                                <span class=" fs-6">5 mins ago</span>
                            </div>
                            <div class="d-flex justify-content-between flex-wrap mb-2">
                                <a href=""
                                    class="text-decoration-none text-white fs-6 bg-secondary rounded-pill px-1">Chapter
                                    4</a>
                                <span class=" fs-6">4 mins ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
