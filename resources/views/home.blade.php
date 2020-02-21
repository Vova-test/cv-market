@extends('layouts.app')

@section('content')
    @can('check','App\Models\CV')
        <div class="uk-container uk-container-small uk-margin-xlarge-top">
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-margin-small-top uk-margin-small-left">
                <label>
                    <input class="uk-radio" type="radio" name="radio-1" value="1" 
                    {{ $checked == 1 ? 'checked' : '' }}> 
                        Checked
                </label>
                <label>
                    <input class="uk-radio" type="radio" name="radio-0"  value="0" 
                    {{ $checked == 0 ? 'checked' : '' }}> 
                        Unchecked
                </label>
            </div>
        </div>
        <script type="text/javascript">

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('input[type=radio]').change(function() {
                let post =[];
                let route = `/home/${checked}`;
                let checked = this.value;
                post = {
                    checked : checked
                };
                // отправим jquery данные
                $.post(
                    route, 
                    post,
                    function(res){ 
                        if (res) {
                            location.reload();
                            //console.log(res); 
                        }
                    }
                );
            });
        </script>>
    @endcan    
    @foreach ($cvs as $cv) 
        <div id="cv-{{ $cv->id}}" class="uk-container uk-container-small">
            <div class="uk-card uk-card-default uk-card-hover uk-width-1-1 uk-margin-top">
                <div class="uk-card-body">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-expand">
                            <h3 class="uk-card-title uk-margin-remove-bottom">
                                <a href="{{ route('cv',['cv'=>$cv->id]) }}">{{ $cv->profession }}</a>
                                <span>{{ $cv->salary }}</span><i>{{ $cv->currency }}</i>
                            </h3>
                            <p class="uk-text-meta uk-margin-remove-top">{{ $cv->created_at }}</p>
                            <div uk-grid>
                                <div class="uk-width-auto@m">
                                    {{ $cv->first_name }} {{$cv->last_name }}
                                </div>
                                <div class="uk-width-auto@m">
                                    Age: {{ $cv->age }}
                                </div>
                                <div class="uk-width-auto@m">
                                    City: {{ $cv->city }}
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-remove-top">
                                <div class="uk-width-auto@m">
                                    Education: {{ $cv->education }}
                                </div>
                                <div class="uk-width-auto@m">
                                    Work: {{ $cv->schedule }}
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


