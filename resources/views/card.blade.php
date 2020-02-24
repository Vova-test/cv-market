@extends('layouts.app')

@section('content')
    <form>
        <fieldset class="uk-fieldset">

            <legend class="uk-legend">First name</legend>
            <div class="uk-margin">
                <input class="uk-input" type="text" name="name" placeholder="First name">
            </div>

            <legend class="uk-legend">Last name</legend>
            <div class="uk-margin">
                <input class="uk-input" type="text" name="last-name" placeholder="Last name">
            </div>

            <legend class="uk-legend">Profession</legend>
            <div class="uk-margin">
                <input class="uk-input" type="text" name="profession" placeholder="Profession">
            </div>

            <legend class="uk-legend">Salary</legend>
            <div class="uk-margin">
                <input class="uk-input" type="text" name="salary" placeholder="0">
            </div>

            <legend class="uk-legend">Currency</legend>            <div class="uk-margin">
                <select class="uk-select">
                    <option>$</option>
                    <option>UAH</option>
                </select>
            </div>

            <legend class="uk-legend">City</legend>
            <div class="uk-margin">
                <input class="uk-input" type="text" name="city" placeholder="City or town">
            </div>

            <legend class="uk-legend">Address</legend>
            <div class="uk-margin">
                <textarea class="uk-textarea" name="address" rows="5" placeholder="Address"></textarea>
            </div>

            <legend class="uk-legend">Phone number</legend>
            <div class="uk-margin">
                <input class="uk-input" type="text" name="phone" placeholder="Phone number">
            </div>

            <legend class="uk-legend">Email</legend>
            <div class="uk-margin">
                <input class="uk-input" type="text" name="email" placeholder="Email@address">
            </div>

            <legend class="uk-legend">Education</legend>
            <div class="uk-margin">
                <textarea class="uk-textarea" name="education" rows="5" placeholder="Education"></textarea>
            </div>

            <legend class="uk-legend">Skills</legend>
            <div class="uk-margin">
                <textarea class="uk-textarea" name="skill" rows="5" placeholder="Skills"></textarea>
            </div>

            <legend class="uk-legend">Language</legend>
            <div class="uk-margin">
                <input class="uk-input" type="text" name="language" placeholder=" ">
            </div>

            <legend class="uk-legend">Age</legend>
            <div class="uk-margin">
                <input class="uk-input" type="text" name="age" placeholder=" ">
            </div>

            <legend class="uk-legend">Schedule</legend>
            <div class="uk-margin">
                <input class="uk-input" type="text" name="schedule" placeholder=" ">
            </div>

            <legend class="uk-legend">Add information</legend>
            <div class="uk-margin">
                <textarea class="uk-textarea" name="add-information" rows="5" placeholder=" "></textarea>
            </div>

            <p uk-margin>
                <a class="uk-button uk-button-default" href="#">Cancel</a>
                <button class="uk-button uk-button-default">Save</button>
            </p>
        </fieldset>
    </form>
@endsection
