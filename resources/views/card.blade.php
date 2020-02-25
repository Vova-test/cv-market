@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form name="save" method="post" action="{{ route($nameRoute,['cv'=>$cvs->id ?? ''])}}">
        @csrf
        <fieldset class="uk-fieldset uk-margin-large">
            <div class="uk-container uk-container-small">
                <div class="uk-card uk-card-default uk-card-hover uk-width-1-1 uk-margin-top">
                    <div class="uk-card-body">
                        <legend class="uk-legend  uk-text-center">Creating new CV</legend>
                        <div class="uk-child-width-expand" uk-grid>
                            <div class="uk-width-expand">
                                <label for="firstName">First name</label>
                                <input class="uk-input" type="text" name="firstName" value="{{ $cvs->first_name ?? '' }}">
                            </div>
                            <div class="uk-width-expand">
                                <label for="lastName">Last name</label>
                                <input class="uk-input" type="text" name="lastName" value="{{ $cvs->last_name ?? '' }}">
                            </div>
                            <div class="uk-width-1-6">
                                <label for="age">Age</label>
                                <input class="uk-input"  type="number" name="age" min="18" max="99" value="{{ $cvs->age ?? '' }}">
                            </div>
                        </div>
                        <div class="uk-child-width-expand uk-margin" uk-grid>
                            <div class="uk-width-1-3">
                                <label for="profession">Profession</label>
                                <input class="uk-input" type="text" name="profession" value="{{ $cvs->profession ?? '' }}">
                            </div>
                            <div class="uk-width-expand" uk-grid>
                                <div class=" uk-width-1-2">
                                    <label for="schedule">Schedule</label>
                                    <input class="uk-input" type="text" name="schedule" value="{{ $cvs->schedule ?? '' }}">
                                </div>
                                <div class="uk-width-1-4">
                                    <label for="salary">Salary</label>
                                    <input class="uk-input" type="number" name="salary" min="0" max="1000000000" value="{{ $cvs->salary ?? '' }}">
                                </div>
                                <div class="uk-width-1-5">
                                    <label for="currency">Currency</label>
                                    <select class="uk-select" name="currency" value="{{ $cvs->currency ?? '' }}">
                                        <option>$</option>
                                        <option>UAH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="uk-child-width-expand" uk-grid>
                            <div class="uk-width-expand">
                                <label for="street">Street-address</label>
                                <input class="uk-input" type="text" name="street" value="{{ $cvs->street_address ?? '' }}">
                            </div>
                            <div class="uk-width-1-6">
                                <label for="zip">Zip/Postal code</label>
                                <input class="uk-input" type="number" name="zip" min="10000" max="999999" value="{{ $cvs->zip_code ?? '' }}">
                            </div>
                        </div>
                        <div class="uk-child-width-expand" uk-grid>
                            <div class="uk-width-1-3">
                                <label for="city">City/Town</label>
                                <input class="uk-input" type="text" name="city" value="{{ $cvs->city ?? '' }}">
                            </div>
                            <div class="uk-width-1-3">
                                <label for="region">Region/State</label>
                                <input class="uk-input" type="text" name="region" value="{{ $cvs->region ?? '' }}">
                            </div>
                            <div class="uk-width-1-3">
                                <label for="country">Country</label>
                                <input class="uk-input" type="text" name="country" value="{{ $cvs->country ?? '' }}">
                            </div>
                        </div>                     
                        <div class="uk-child-width-expand uk-margin" uk-grid>
                            <div class="uk-width-1-4">
                                <label for="phone">Phone number</label>
                                <input class="uk-input" type="text" name="phone" value="{{ $cvs->phone_number ?? '' }}">
                            </div>
                            <div class="uk-width-1-2">
                                <label for="email">Email</label>
                                <input class="uk-input" type="email" name="email" value="{{ $cvs->email ?? '' }}">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label for="education">Education</label>
                            <textarea class="uk-textarea" name="education" rows="5">{{ $cvs->education ?? '' }}</textarea>
                        </div>
                        <div class="uk-margin">
                            <label for="skills">Skills</label>
                            <textarea class="uk-textarea" name="skills" rows="5">{{ $cvs->skills ?? '' }}</textarea>
                        </div>
                        <div class="uk-margin">
                            <label for="experience">Experience</label>
                            <textarea class="uk-textarea" name="experience" rows="5">{{ $cvs->experience ?? '' }}</textarea>
                        </div>
                        <div class="uk-margin uk-width-1-2">
                            <label for="language">Languages</label>
                            <input class="uk-input" type="text" name="language" value="{{ $cvs->language ?? '' }}">
                        </div>
                        <div class="uk-margin">
                            <label for="addInformation">Add information</label>
                            <textarea class="uk-textarea" name="addInformation" rows="5">{{ $cvs->add_information ?? '' }}</textarea>
                        </div>
                        <p uk-margin>
                            <a class="uk-button uk-button-default" href="{{ route('home') }}">Cancel</a>
                            <button class="uk-button uk-button-default">Save</button>
                        </p>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
@endsection
