@extends('layouts.app')

@section('content')
        <div class="uk-container uk-container-small">
            <div class="uk-card uk-card-default uk-card-hover uk-width-1-1">
                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-expand">
                            <h3 class="uk-card-title uk-margin-remove-bottom">
                                <a>Truck driver</a>
                                <span>4000</span><i>$</i>
                            </h3>
                            <p class="uk-text-meta uk-margin-remove-top">2 February</p>
                            <div uk-grid>
                                <div class="uk-width-auto@m">
                                    John Black
                                </div>
                                <div class="uk-width-auto@m">
                                    Age: 47
                                </div>
                                <div class="uk-width-auto@m">
                                    City: Kyiv
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-remove-top">
                                <div class="uk-width-auto@m">
                                    Education: High school
                                </div>
                                <div class="uk-width-auto@m">
                                    Work: Full time
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
@endsection


