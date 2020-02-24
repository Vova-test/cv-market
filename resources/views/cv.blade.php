@extends('layouts.app')

@section('content')
    <div class="uk-container uk-container-small">
        <div class="uk-card uk-card-default uk-card-hover uk-width-1-1 uk-margin-top">
        	<div class="uk-card-header uk-padding-remove-bottom uk-background-muted">
        		<p uk-margin>
        			<a class="uk-button-small uk-button-primary" href="#" uk-icon="icon: file-pdf"></a>
        			@can('update', $cv)
        				<a class="uk-button-small uk-button-primary" href="#" uk-icon="icon: file-edit"></a>
				    	<a class="uk-button-small uk-button-danger" href="{{ route('deleteCV',['cv'=>$cv->id]) }}" uk-icon="icon: trash"></a>
				    @endcan
				    @can('check', $cv)	
				    	<a class="uk-button-small uk-button-primary" href="{{ route('checkCV',['cv'=>$cv->id]) }}" uk-icon="icon: check"></a>
				    @endcan
				    <a class="uk-button-small uk-button-primary uk-align-right" href="/#cv-{{ $cv->id }}" uk-icon="icon: close"></a>
				</p>
			</div>
            <div class="uk-card-body">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                	<div class="uk-width-expand">
                        <h1 class="uk-article-title">
                            {{ $cv->first_name }} {{ $cv->last_name }}
                        </h1>
                        <h2 class="uk-card-title">
                            {{ $cv->profession }}
                        </h2>
                        <h2 class="uk-card-title">
                            {{ $cv->salery }}
                        </h2>    
                        <div uk-grid>
                            <div class="uk-width-auto@m">
                            	<div class="uk-margin-small-right" uk-icon="clock">
                            	</div>                            	
                                {{ $cv->created_at }}
                            </div>
                            <div class="uk-width-auto@m">
                            	<div class="uk-margin-small-right" uk-icon="location">
                            	</div>
                                City: {{ $cv->city }}
                            </div>
                        </div>
                        <div class="uk-grid uk-margin-remove-top">
                            <div class="uk-width-auto@m">
                                Work: {{ $cv->schedule }}
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-auto">
                        <img class="uk-border-circle" width="40" height="40" src="images/avatar.jpg">
                    </div>
                </div>
                @can('view', $cv)
	            	<div>"Premium Information"</div>
	            @endcan
	            <article class="uk-article">
				    <h5  class="uk-article-title">EXPERIENCE:</h5>
				    <p>{{ $cv->experience }}</p>
				</article>
	            <h4>
	            	EDUCATION:
	            </h4>
	            <div>
	            	{{ $cv->education }}	
	            </div>	
	            <h4>
	            	LANGUAGES:
	            </h4>
	            <div>
	            	{{ $cv->language }}	
	            </div>
	            <h4>
	            	ADDITIONAL INFORMATION:
	            </h4>
	            <div>
	            	{{ $cv->add_information }}	
	            </div>
            </div>
        </div>
    </div>
@endsection
