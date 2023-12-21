<div class="container-fluid" id="TablePatients">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-primary">Disease level table</h4>
            <form action="/queue-room/move" role="form" id="form" name="form" method="POST">
                @csrf
                <button type="submit" id="submit-button" class="btn btn-primary btn-icon-split form-control">
                    <span class="text">Move Patients</span>
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Time Add</th>
                                        <th>Disease</th>
                                        <th>Additional message</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Patients as $Patient)
                                        <tr>
                                            <td> {{ $loop->index + 1 }} </td>
                                            <td> {{ $Patient['PhysId'] }} </td>
                                            <td> {{ $Patient['name'] }} </td>
                                            <td> {{ $Patient['age'] }} </td>
                                            <td> {{ json_decode($Patient['gender'])->value }} </td>
                                            <td> {{ $Patient['created_at'] }} </td>
                                            <td> {{ json_decode($Patient['disease'])->name }} </td>
                                            <td> {{ $Patient['message'] }} </td>
                                            <td> <a href="/queue-room/remove/{{ $Patient['PhysId'] }}"> Remove </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Time Add</th>
                                    <th>Disease</th>
                                    <th>Additional message</th>
                                    <th></th>
                                </tfoot>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
