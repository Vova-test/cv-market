@extends('layouts.app')

@section('content')
    <form>
        <fieldset class="uk-fieldset uk-margin-large">
            <div class="uk-container uk-container-small">
                <div class="uk-card uk-card-default uk-card-hover uk-width-1-1 uk-margin-top">
                    <div class="uk-card-body">
                        <legend class="uk-legend  uk-text-center">Creating new CV</legend>
                        <div class="uk-child-width-expand" uk-grid>
                            <div>
                                <label for="name">First name</label>
                                <input class="uk-input" type="text" name="name">
                            </div>
                            <div>
                                <label for="last-name">Last name</label>
                                <input class="uk-input" type="text" name="last-name">
                            </div>
                            <div class="uk-width-auto">
                                    <label for="age">Age</label>
                                    <input class="uk-input"  type="number" name="age" min="18" max="99">
                            </div>
                        </div>
                        <div class="uk-child-width-expand uk-margin" uk-grid>
                            <div class="uk-width-1-3">
                                <label for="profession">Profession</label>
                                <input class="uk-input" type="text" name="profession">
                            </div>
                            <div class="uk-width-expand" uk-grid>
                                <div class=" uk-width-1-2">
                                    <label for="schedule">Schedule</label>
                                    <input class="uk-input" type="text" name="schedule">
                                </div>
                                <div class="uk-width-1-4">
                                    <label for="salary">Salary</label>
                                    <input class="uk-input" type="text" name="salary">
                                </div>
                                <div class="uk-width-1-4">
                                    <label for="currency">Currency</label>
                                    <select class="uk-select" name="currency">
                                        <option>$</option>
                                        <option>UAH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="uk-margin uk-width-1-3">
                            <label for="city">City</label>
                            <input class="uk-input" type="text" name="city">
                        </div>
                        <div class="uk-margin">
                            <label for="address">Address</label>
                            <textarea class="uk-textarea" name="address" rows="5"></textarea>
                        </div>
                        <div class="uk-child-width-expand uk-margin" uk-grid>
                            <div class="uk-width-1-4">
                                <label for="phone">Phone number</label>
                                <input class="uk-input" type="text" name="phone">
                            </div>
                            <div class="uk-width-1-2">
                                <label for="email">Email</label>
                                <input class="uk-input" type="text" name="email">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label for="education">Education</label>
                            <textarea class="uk-textarea" name="education" rows="5"></textarea>
                        </div>
                        <p class="uk-margin">Skills<br>
                            <textarea class="uk-textarea" name="skill" rows="5"></textarea>
                        </p>
                        <p class="uk-margin uk-width-1-2">Languages<br>
                            <input class="uk-input" type="text" name="language">
                        </p>
                        <p class="uk-margin">Add information<br>
                            <textarea class="uk-textarea" name="add-information" rows="5"></textarea>
                        </p>
                        <p uk-margin>
                            <a class="uk-button uk-button-default" href="#">Cancel</a>
                            <button class="uk-button uk-button-default">Save</button>
                        </p>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
@endsection
