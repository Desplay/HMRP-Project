<div class="container">
    <div class="row">
        <img src="{{ asset('images/quack.png') }}" class="img-fluid" alt=""
            style="margin: auto; display: block; width: 300px; height: auto" />
        <div class="col-lg-8 col-8 mx-auto">
            <div class="booking-form">
                <h2 class="text-center mb-lg-3 mb-2">EDIT PATIENT</h2>
                <form action="/edit-patient/submit" role="form" id="form" name="form" method="post">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="PhysId" id="PhysId" class="form-control"
                            value="{{ $Patient['PhysId'] }}" required />
                        <div class="col-lg-6 cod-12">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Full name" value="{{ $Patient['name'] }}" required />
                        </div>
                        <div class="col-lg-6 cod-12">
                            <input type="number" name="age" id="age" class="form-control" placeholder="Age"
                                value="{{ $Patient['age'] }}" required />
                        </div>
                        <div class="col-lg-6 cod-12">
                            <select type="gender" name="gender" class="form-control" required>
                                @php
                                    $valueGender = json_decode($Patient['gender']);
                                @endphp
                                <option value="{{ json_encode($valueGender) }}">{{ $valueGender->value }}</option>
                                @foreach ($Genders as $Gender)
                                    @if ($valueGender->ID != $Gender['ID'])
                                        <option value="{{ json_encode($Gender) }}">{{ $Gender['value'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 cod-12">
                            <select type="disease" name="disease" class="form-control" required>
                                @php
                                    $valueDisease = json_decode($Patient['disease']);
                                @endphp
                                <option value="{{ json_encode($valueDisease) }}">{{ $valueDisease->name }}</option>
                                @foreach ($Diseases as $Disease)
                                    @if ($valueDisease->ID != $Disease['ID'])
                                        <option value="{{ json_encode($Disease) }}">{{ $Disease['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 cod-12">
                            <textarea class="form-control" rows="5" id="message" name="message" placeholder="Additional Message"> {{ $Patient['message'] }}</textarea>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6 mx-auto text-center">
                            <button type="submit" class="form-control" id="submit-button">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
