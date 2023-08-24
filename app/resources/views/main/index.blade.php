@extends('layout')

@section('content')
    <div class="top-section-main">
        <div class="top-section">
            <div class="container main-top-container">
                <div class="col-md-8 m-auto d-flex text-center">
                    <span class="d-flex align-items-center main-text">Find what you need around</span>
                </div>
                <div class="search-section">
                    <div class="search-box col-md-7 m-auto d-flex row align-center">
                        <input class="col-md-10 search-border m-auto search-input m-">
                        <button class="col-md-1 search-border m-auto search-button">
                            <img src="/images/search.png" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container content-after-top-section">
        <div class="category-container m-auto col-md-12">
            <div class="category-section pt-10 mt-5 d-flex col-md-12">
                <div class="col-md-3">
                    <div class="category-box mx-5 px-4 py-2">
                        <a href="#">
                            <span class="span category-title">Vehicles</span>
                            <img class="category-car" src="/images/categories/car.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-box mx-5 px-4 py-2">
                        <span class="span category-title">Gadgets</span>
                        <img class="category-phone" src="/images/categories/phone.svg" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-box mx-5 px-4 py-2">
                        <span class="span category-title">Jobs</span>
                        <img class="category-job" src="/images/categories/job.svg" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-box mx-5 px-4 py-2">
                        <span class="span category-title">Job applicant</span>
                        <img class="category-phone" src="/images/categories/notepad.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="category-section pt-10 mt-5 d-flex col-md-12">
                <div class="col-md-3">
                    <div class="category-box mx-5 px-4 py-2">
                        <span class="span category-title">Real estate</span>
                        <img class="category-estate" src="/images/categories/house.svg" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-box mx-5 px-4 py-2">
                        <span class="span category-title">Service</span>
                        <img class="category-phone" src="/images/categories/service.svg" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-box mx-5 px-4 py-2">
                        <span class="span category-title">Accommodation</span>
                        <img class="category-key" src="/images/categories/key.svg" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-box mx-5 px-4 py-2">
                        <span class="span category-title">Parts</span>
                        <img class="category-pats" src="/images/categories/parts.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 m-auto text-center p-5">
            <h2 class="mt-5 pt-5 main-separator">Featured ads</h2>
        </div>
        <div class="m-auto col-md-12 d-flex row card-section">
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/test.jpeg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">Cars for rent</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/car2.jpg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">aston martin victor</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/test.jpeg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">Cars for rent</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/car2.jpg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">aston martin victor</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/test.jpeg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">Cars for rent</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/car2.jpg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">aston martin victor</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/test.jpeg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">Cars for rent</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/car2.jpg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">aston martin victor</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/test.jpeg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">Cars for rent</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/car2.jpg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">aston martin victor</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/test.jpeg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">Cars for rent</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/car2.jpg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">aston martin victor</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/test.jpeg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">Cars for rent</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/car2.jpg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">aston martin victor</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/test.jpeg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">Cars for rent</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/car2.jpg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">aston martin victor</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/test.jpeg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">Cars for rent</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/car2.jpg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">aston martin victor</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/test.jpeg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">Cars for rent</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-4 pb-5">
                <div class="card px-0 border-gray">
                    <img class="card-img-top" src="/images/car2.jpg">
                    <div class="card-body">
                        <p class="card-title">&euro; 120</p>
                        <p class="card-text mb-0">aston martin victor</p>
                        <small class="text-muted">London</small>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

