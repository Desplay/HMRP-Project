<div class="container-fluid" id="TablePatients">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h4 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-table"></i>
                    Patients Treated
                </h4>
                <div class="my-2">
                    <form action="/doctor-room/{{ $Doctor['ID'] }}/done" method="post">
                        @csrf
                        <button type="submit" id="submit-button" class="btn btn-primary btn-icon-split form-control">
                            <span class="text"> Done First patients and move next</span>
                            <span class="icon text-gray-600">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> ID </th>
                                        <th> Name </th>
                                        <th> Age </th>
                                        <th> Gender </th>
                                        <th> Time Add </th>
                                        <th> Disease </th>
                                        <th> Additional message </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Patients as $Patient)
                                        @if ($loop->index == 0)
                                            <tr>
                                                <td style=" font-weight: bold; color: red"> {{ $loop->index + 1 }} </td>
                                                <td style=" font-weight: bold; color: red"> {{ $Patient['PhysId'] }}
                                                </td>
                                                <td style=" font-weight: bold; color: red"> {{ $Patient['name'] }} </td>
                                                <td style=" font-weight: bold; color: red"> {{ $Patient['age'] }} </td>
                                                <td style=" font-weight: bold; color: red">
                                                    {{ json_decode($Patient['gender'])->value }} </td>
                                                <td style=" font-weight: bold; color: red"> {{ $Patient['created_at'] }}
                                                </td>
                                                <td style=" font-weight: bold; color: red">
                                                    {{ json_decode($Patient['disease'])->name }} </td>
                                                <td style=" font-weight: bold; color: red"> {{ $Patient['message'] }}
                                                </td>
                                                <td style=" font-weight: bold; color: red"> Now Treading </td>
                                            </tr>
                                        @else
                                        <tr>
                                            <td> {{ $loop->index + 1 }} </td>
                                            <td> {{ $Patient['PhysId'] }}
                                            </td>
                                            <td> {{ $Patient['name'] }} </td>
                                            <td> {{ $Patient['age'] }} </td>
                                            <td>
                                                {{ json_decode($Patient['gender'])->value }} </td>
                                            <td> {{ $Patient['created_at'] }}
                                            </td>
                                            <td>
                                                {{ json_decode($Patient['disease'])->name }} </td>
                                            <td> {{ $Patient['message'] }}
                                            </td>
                                            <td> <a href="/doctor-room/remove/{{ $Doctor['ID'] }}/{{ $Patient['PhysId'] }}"> Remove </a>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th> # </th>
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th> Age </th>
                                    <th> Gender </th>
                                    <th> Time Add </th>
                                    <th> Disease </th>
                                    <th> Additional message </th>
                                    <th> </th>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
