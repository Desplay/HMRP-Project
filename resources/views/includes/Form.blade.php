<div class="container">
    <div class="row">
        <div class="cod-lg-8 col-8 mx-auto">
            <div class="booking-form">
                <h2 class="text-center mb-lg-3 mb-2">Add Patient Form</h2>
                <form action="/lobby/submit" role="form" id="form" name="form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 cod-12">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Full name" required />
                        </div>
                        <div class="col-lg-6 cod-12">
                            <input type="number" name="age" id="age" class="form-control" placeholder="Age"
                                required />
                        </div>
                        <div class="col-lg-6 cod-12">
                            <select type="gender" name="gender" class="form-control" required>
                                <option style="display: none" value="">Choose your gender</option>
                                @foreach ($Genders as $Gender)
                                    <option value="{{ json_encode($Gender) }}"> {{ $Gender['value'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 cod-12">
                            <select type="disease" name="disease" class="form-control" required>
                                <option style="display: none" value="">Choose your disease</option>
                                @foreach ($Diseases as $Disease)
                                    <option value="{{ json_encode($Disease) }}"> {{ $Disease['name'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 cod-12">
                            <textarea class="form-control" rows="5" id="message" name="message" placeholder="Additional Message"></textarea>
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
