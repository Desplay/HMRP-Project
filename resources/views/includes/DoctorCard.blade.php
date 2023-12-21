@foreach ($Doctors as $Doctor)
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="/doctor-room/{{ $Doctor['ID'] }}">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Doctor {{ $Doctor['name'] }}
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    @php
                                        $With = count($Doctor['queue']) / $Doctor['slot'] * 100;
                                        $String = count($Doctor['queue']) . ' / ' . $Doctor['slot'];
                                    @endphp
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> {{ $String }} </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        @php
                                            $with = 20;
                                        @endphp
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width:{{ $With . '%' }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach
