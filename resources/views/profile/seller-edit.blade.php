@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="px-3 pt-4 pb-2">
        <img style="width:150px" class="me-3 avatar-sm rounded-circle"
            src="{{$user->getImageURL()}}" alt="Mario Avatar">

        <div class="d-flex align-items-center justify-content-between w-100">

            <div class="d-flex align-items-center w-100">

                <form action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data"  method="POST" class="w-100">

                    @csrf
                    @method('put')

                    <div class="mt-3 px-2 w-100">
                        <label for="bio">Bio
                            <textarea class="form-control" cols=100 name="bio"> {{ $user->bio ?? 'enter your bio' }}</textarea>
                        </label>
                        @error('bio')
                            <div class="fs-6 bg-danger mt-2"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3 px-2 w-100">
                        <label for="age">Age
                            <input class="form-control" type="number" name="age" id="age" min="18" max="100" step="1">
                        </label>
                        @error('age')
                            <div class="fs-6 bg-danger mt-2"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3 px-2 w-100">
                        <label for="height">Height
                            <input class="form-control" type="number" name="height" id="height" min="140" max="250" step="1">
                        </label>
                        @error('height')
                            <div class="fs-6 bg-danger mt-2"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3 px-2 w-100">
                        <label for="weight">Weight
                            <input class="form-control" type="number" name="weight" id="weight" min="30" max="300" step="1">
                        </label>
                        @error('weight')
                            <div class="fs-6 bg-danger mt-2"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3 px-2 w-100">
                        <label for="sexually_active">Active Sex Life?
                            <select class="form-control" name="sexually_active" id="sexually_active">
                                <option value="yes">Yes</option>
                                <option value="yes">No</option>
                            </select>
                        </label>
                        @error('sexually_active')
                            <div class="fs-6 bg-danger mt-2"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3 px-2 w-100">
                        <label for="birth_control">Birth Control?
                            <select class="form-control" name="birth_control" id="birth_control">
                                <option value="yes">Yes</option>
                                <option value="yes">No</option>
                            </select>
                        </label>
                        @error('birth_control')
                            <div class="fs-6 bg-danger mt-2"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3 px-2 w-100">
                        <label for="sex_frequency">Sex Frequency?
                            <select class="form-control" name="sex_frequency" id="sex_frequency">
                                <option value="monthly">Monthly</option>
                                <option value="weekly">Weekly</option>
                                <option value="daily">Daily</option>
                            </select>
                        </label>
                        @error('sex_frequency')
                            <div class="fs-6 bg-danger mt-2"> {{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mt-3 px-2 w-100">
                        <label for="anal_sex">Anal Sex?
                            <select class="form-control" name="anal_sex" id="anal_sex">
                                <option value="yes">Yes</option>
                                <option value="yes">No</option>
                            </select>
                        </label>
                        @error('anal_sex')
                            <div class="fs-6 bg-danger mt-2"> {{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mt-3 px-2">
                        <label for="image">Profile Picture</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <div class="fs-6 bg-danger mt-2"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3 px-2 align-self justify-self">
                        <button type ="submit" class="btn btn-sm btn-primary">
                            Update
                        </button>
                        <a type="text-decoration-none" href="{{ route('profile.show', $user->id) }}">View</a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
