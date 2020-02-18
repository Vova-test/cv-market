@extends('layouts.app')

@section('content')
        <div class="uk-container uk-container-small">
            <div class="uk-card uk-card-default uk-card-hover uk-width-1-1">
                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-expand">
                            <h3 class="uk-card-title uk-margin-remove-bottom">John Black</h3>
                            <p class="uk-text-meta uk-margin-remove-top">Truck driver,  4000$</p>
                            <p class="uk-text-meta uk-margin-remove-top">2 February,  City:Kyiv</p>
                            <div uk-grid>
                                <div class="uk-width-auto@m">
                                    <p>Test1</p>
                                    <p>Test2</p>
                                    <p>Test3</p>
                                </div>
                                <div class="uk-width-auto@m">
                                    <p>Value1</p>
                                    <p>Value2</p>
                                    <p>Value3</p>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-auto">
                            <img class="uk-border-circle" width="40" height="40" src="images/avatar.jpg">
                        </div>
                    </div>
                </div>
                <div class="uk-card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                </div>
                <div class="uk-card-footer">
                    <a href="#" class="uk-button uk-button-text">Read more</a>
                </div>
            </div>
        </div>

@endsection


