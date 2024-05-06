<div class="header bg-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Sponsors</h5>
                                    <span class="h2 font-weight-bold mb-0">{{count($sponsors)}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                @if(count($last_month_sponsors) > 0)
                                    <span class="text-success mr-2">
                                        @if(count($last_month_sponsors) !== 0)
                                        <i class="fa fa-arrow-up">
                                        @endif
                                            @else
                                    <span class="text-danger mr-2">
                                        @if(count($last_month_sponsors) !== 0)
                                        <i class="fas fa-arrow-down">
                                            @endif
                                @endif
                                    </i>{{count($last_month_sponsors)}}</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Children</h5>
                                    <span class="h2 font-weight-bold mb-0">{{count($childrens)}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-child"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                @if(count($last_month_childrens) > 0)
                                    <span class="text-success mr-2">
                                        @if(count($last_month_childrens) !== 0)
                                        <i class="fa fa-arrow-up">
                                        @endif
                                            @else
                                    <span class="text-danger mr-2">
                                    @if(count($last_month_childrens) !== 0)
                                        <i class="fas fa-arrow-down">
                                    @endif
                                @endif
                                    </i>{{count($last_month_childrens)}}</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Gifts</h5>
                                    <span class="h2 font-weight-bold mb-0">{{count($gifts)}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-gifts"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                @if(count($last_month_gifts) > 0)
                                    <span class="text-success mr-2">
                                        @if(count($last_month_gifts) !== 0)
                                        <i class="fa fa-arrow-up">
                                        @endif
                                            @else
                                    <span class="text-danger mr-2">
                                        @if(count($last_month_gifts) !== 0)
                                            <i class="fas fa-arrow-down">
                                        @endif
                                @endif
                                    </i> {{count($last_month_gifts)}}</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Fundraiser</h5>
                                    <span class="h2 font-weight-bold mb-0">{{count($fundraisers)}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                @if(count($last_month_fundraisers) > 0)
                                    <span class="text-success mr-2">
                                        @if(count($last_month_fundraisers) !== 0)
                                        <i class="fa fa-arrow-up">
                                        @endif
                                            @else
                                        <span class="text-danger mr-2">
                                        @if(count($last_month_fundraisers) !== 0)
                                            <i class="fas fa-arrow-down">
                                        @endif
                                @endif
                                    </i> {{count($last_month_fundraisers)}}</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
