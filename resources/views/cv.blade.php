@extends('layouts.app')

@section('content')
    <div class="uk-container uk-container-small">
        <div class="uk-card uk-card-default uk-card-hover uk-width-1-1 uk-margin-top">
        	<div class="uk-card-header uk-padding-remove-bottom uk-background-muted">
        		<p uk-margin>
        			<a class="uk-button-small uk-button-primary" href="#" uk-icon="icon: file-pdf"></a>
        			@can('update', $cv)
        				<a class="uk-button-small uk-button-primary" href="{{ route('showUpdatePage',['cv'=>$cv->id]) }}" uk-icon="icon: file-edit"></a>
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
                        <h2 class="uk-card-title uk-margin-remove">
                            {{ $cv->profession }}, {{ $cv->salary }}{{ $cv->currency }}
                        </h2>  
                        <div uk-grid>
                            <div class="uk-width-auto">
                            	<p>
                            		<div class="uk-margin-small-right" uk-icon="clock"></div> 
                            		{{ $cv->created_at }}
                            	</p>
                            </div>
                            @cannot('view', $cv)
	                            <div class="uk-width-auto">
	                            	<p>
	                            		<div class="uk-margin-small-right" uk-icon="location"></div>
	                                	City: {{ $cv->city }}
	                                </p>
	                            </div>
	                        @endcannot
                        </div>
                        <div class="uk-grid uk-margin-remove-top">
                            <div class="uk-width-auto">
                                Age: {{ $cv->age }}
                            </div>
                        </div>
                        <div class="uk-grid uk-margin-remove-top uk-margin-bottom">
                            <div class="uk-width-auto">
                                Schedule: {{ $cv->schedule }}
                            </div>
                        </div>
                    </div>
                    @if (!empty($cv->image_link))
                    	<div class="uk-width-auto" uk-lightbox>
	                    	<a class="uk-inline" href="{{ '/images/' . $cv->image_link }}" data-caption="Photo on CV-market">
					            <img width="250" src="{{ asset('/images/' . $cv->image_link) }}">
					        </a>
	                    </div>
                    @endif
                </div>
                @can('view', $cv)
                	<div uk-grid class='uk-margin-remove-top'>
                        <div class="uk-width-auto">
		                	<h4 class="uk-margin-remove">
				            	Email: {{ $cv->email }}
				            </h4>
				        </div>
			            @can('check', $cv)
				            <div class="uk-width-auto {{ $iconColor }}">
				            	<span class="uk-margin-small-right" uk-icon="{{$emailIcon}}"></span>            	
				            </div>
			            @endcan
			        </div>			           
		            <h4 class="uk-margin-remove">
		            	Phone number: {{ $cv->phone_number }}
		            </h4>
		            <div class="uk-margin-top">
	                	<h4 class="uk-margin-remove">
	                		<div class="uk-margin-small-right" uk-icon="location"></div>
			            	Address:
			            </h4>
			            <div>
			            	{{ $cv->street_address }},
			            </div>
			            <div>
			            	{{ $cv->city }}, {{ $cv->region }},
			            </div>
			            <div>
			            	{{ $cv->zip_code }},
			            </div>
			            <div>
			            	{{ $cv->country }}
			            </div>
			        </div>
	            @else
	            	<div class="uk-card uk-card-primary uk-card-body">
	            		<h2 class="uk-card-title uk-margin-remove">
	            			Get a premium account to see more information
	            		</h2>
	            	</div>
	            @endcan
	            <div class="uk-margin-top">
					<h4 class="uk-margin-remove">
						Experience:
					</h4>
					<div>
						{{ $cv->experience }}
					</div>
				</div>
				<div class="uk-margin-top">
		            <h4 class="uk-margin-remove">
		            	Education:
		            </h4>
		            <div>
		            	{{ $cv->education }}	
		            </div>
		        </div>	
	            @can('view', $cv)
	            	<div class="uk-margin-top">
			            <h4 class="uk-margin-remove">
			            	Skills:
			            </h4>
			            <div>
			            	{{ $cv->skills }}	
			            </div>
			        </div>
			        <div class="uk-margin-top">
			            <h4 class="uk-margin-remove">
			            	Languages:
			            </h4>
			            <div>
			            	{{ $cv->language }}	
			            </div>
			        </div>
		        @endcan
		        <div class="uk-margin-top">
		            <h4 class="uk-margin-remove">
		            	Addition information:
		            </h4>
		            <div>
		            	{{ $cv->add_information }}	
		            </div>
		        </div>
            </div>
        </div>
    </div>
@endsection
