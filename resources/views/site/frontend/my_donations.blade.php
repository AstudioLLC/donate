@extends('site.layouts.app')

@section('content')


    @push('css')
        <link rel="stylesheet" href="{{ ('css/frontend/swiper.css') }}">
        <link rel="stylesheet" href="{{ ('css/frontend/profile.css') }}">
        <link rel="stylesheet" href="{{ ('css/frontend/profile-home.css') }}">

        <link rel="stylesheet" href="{{ ('css/frontend/my-donations.css') }}">
    @endpush



    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.components.panel-left-profile')
            </div>

            <div class="profile-content-right">
                <div class="my-donations-page d-flex flex-column">
                    <div class="donations-page-top d-flex flex-column">
                        <span class="title-usual text-start">My Donations</span>
                        <div class="donation-history-block">
                            <span class="history-text">All donation history</span>

                            <form class="datepickers-form">
                            <div class="datepickers-group">
                                <input class="date-input" type="date">
                                <span>-</span>
                                <input class="date-input date-input2" type="date">
                            </div>

                            <button class="button-orange calendar-orange-button" type="submit">
                                <img class="img-fluid" src="{{ asset('images/loupe22.svg') }}" alt="" title="">
                            </button>
                        </form>
                        </div>
                    </div>

                    <div class="donation-table-wrap">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="th-names">Data</th>
                                <th scope="col" class="th-names">Designation</th>
                                <th scope="col" class="th-names">Amount</th>
                                <th scope="col" class="th-names">Frequency</th>
                                <th scope="col" class="th-names">Receipt</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">March 28,  2020</th>
                                <td>Where Most Nedded</td>
                                <td>10000 AMD</td>
                                <td>Monthly</td>
                                <td>Download Receipt</td>
                            </tr>
                            <tr>
                                <th scope="row">April 15,  2020</th>
                                <td>Where Most Nedded</td>
                                <td>10000 AMD</td>
                                <td>One Time</td>
                                <td>Download Receipt</td>
                            </tr>
                            <tr>
                                <th scope="row">March 28,  2020</th>
                                <td >Where Most Nedded</td>
                                <td>10000 AMD</td>
                                <td>Montly</td>
                                <td>Download Receipt</td>
                            </tr>

                            <tr>
                                <th scope="row">March 28,  2020</th>
                                <td>Where Most Nedded</td>
                                <td>10000 AMD</td>
                                <td>One Time</td>
                                <td>Download Receipt</td>
                            </tr>


                            </tbody>
                        </table>

                        <div class="donation-table-mobile">

                            <div class="mobile-table-box">
                                <div class="row">
                                    <div class="col-12 mobile-table-col">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="th-names">Data</span>
                                        </div>

                                        <div class="col-6">
                                            <span class="th-val">March 28,  2020</span>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-12 mobile-table-col">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="th-names">Designation</span>
                                        </div>

                                        <div class="col-6">
                                            <span class="th-val">Where Most Nedded</span>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-12 mobile-table-col">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="th-names">Amount</span>
                                        </div>

                                        <div class="col-6">
                                            <span class="th-val">10000 AMD</span>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-12 mobile-table-col">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="th-names">Frequency</span>
                                        </div>

                                        <div class="col-6">
                                            <span class="th-val">Monthly</span>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-12 mobile-table-col">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="th-names">Receipt</span>
                                        </div>

                                        <div class="col-6">
                                            <span class="th-val">Download Receipt</span>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="mobile-table-box">
                                <div class="row">
                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Data</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">March 28,  2020</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Designation</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">Where Most Nedded</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Amount</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">10000 AMD</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Frequency</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">Monthly</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Receipt</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">Download Receipt</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mobile-table-box">
                                <div class="row">
                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Data</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">March 28,  2020</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Designation</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">Where Most Nedded</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Amount</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">10000 AMD</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Frequency</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">Monthly</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Receipt</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">Download Receipt</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mobile-table-box">
                                <div class="row">
                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Data</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">March 28,  2020</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Designation</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">Where Most Nedded</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Amount</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">10000 AMD</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Frequency</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">Monthly</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Receipt</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">Download Receipt</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mobile-table-box">
                                <div class="row">
                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Data</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">March 28,  2020</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Designation</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">Where Most Nedded</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Amount</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">10000 AMD</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Frequency</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">Monthly</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mobile-table-col">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="th-names">Receipt</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="th-val">Download Receipt</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
