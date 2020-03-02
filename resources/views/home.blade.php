@extends('layouts.app')

@section('content')
    @can('viewAny','App\Models\User')
        <form name="checked-unchecked" method="get" action="{{ route('home')}}">
            @csrf
            <div class="uk-container uk-container-small uk-margin-xlarge-top">
                <div class="uk-margin uk-grid-small uk-child-width-auto uk-margin-small-top uk-margin-small-left">
                    <label>
                        <input class="a uk-radio" type="radio" name="radio" value="1"
                        {{ $checked == 1 ? 'checked' : '' }}
                        href="{{ route('home', ['checked' => 1]) }}"
                        onclick="clickRadio(this, 1)"> 
                            Checked
                    </label>
                    <label>
                        <input class="a uk-radio" type="radio" name="radio" value="0" 
                        {{ $checked == 0 ? 'checked' : '' }}
                        href="{{ route('home', ['checked' => 0]) }}"
                        onclick="clickRadio(this, 0)"> 
                            Unchecked
                    </label>
                </div>
            </div>
        </form>
        <script type="text/javascript">
            function clickRadio(el, checked) {
                document.getElementsByName('checked-unchecked')[0].submit();
                //console.log(typebutton);
            }
            
        </script>
    @endcan 

    <div class="uk-container uk-container-small">
        <div class="uk-card-default uk-card-hover uk-width-1-1 uk-margin-top uk-align-center">
            {{ $cvs->appends(request()->query())->links() }}
        </div>
        @foreach ($cvs as $cv) 
            <div id="cv-{{ $cv->id}}" class="uk-card uk-card-default uk-card-hover uk-width-1-1 uk-margin-top">
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
                        @if (!empty($cv->image_link))
                            <div class="uk-width-auto" uk-grid uk-lightbox="animation: slide">
                                <a class="uk-inline" href="{{ '/images/' . $cv->image_link }}" data-caption="Photo on CV-market">
                                    <img width="100" src="{{ '/images/' . $cv->image_link }}">
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <div class="uk-card-default uk-card-hover uk-width-1-1 uk-margin-top uk-align-center">
            {{ $cvs->links() }}
        </div>
    </div>
@endsection


