@extends('layouts.app')

@section('content')
    @foreach ($cv as $home) 
        <div class="uk-container uk-container-small">
            <div class="uk-card uk-card-default uk-card-hover uk-width-1-1 uk-margin-top">
                <div class="uk-card-body">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-expand">
                            <h3 class="uk-card-title uk-margin-remove-bottom">
                                <a href="{{ url("/cv/{$home->id}") }}">{{ $home->profession }}</a>
                                <span>{{ $home->salary }}</span><i>{{ $home->valute }}</i>
                            </h3>
                            <p class="uk-text-meta uk-margin-remove-top">{{ $home->created_at }}</p>
                            <div uk-grid>
                                <div class="uk-width-auto@m">
                                    {{ $home->first_name }} {{$home->last_name }}
                                </div>
                                <div class="uk-width-auto@m">
                                    Age: {{ $home->salary }}
                                </div>
                                <div class="uk-width-auto@m">
                                    City: {{ $home->city }}
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-remove-top">
                                <div class="uk-width-auto@m">
                                    Education: {{ $home->education }}
                                </div>
                                <div class="uk-width-auto@m">
                                    Work: {{ $home->schedule }}
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-auto">
                            <img class="uk-border-circle" width="40" height="40" src="images/avatar.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection


