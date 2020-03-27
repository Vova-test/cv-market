<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="/css/task-js.css">
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/js/uikit-icons.min.js"></script>
</head>
<body>
    <div class="uk-container uk-container-small">
	    <div class="uk-card uk-card-default uk-card-hover uk-width-1-1 uk-margin-top">
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
					        <img width="250" src="data:image/png;base64,{{ $imageContent }}">
	                    </div>
	                @endif
	            </div>
	        	<div uk-grid class='uk-margin-remove-top'>
	                <div class="uk-width-auto">
	                	<h4 class="uk-margin-remove">
			            	Email: {{ $cv->email }}
			            </h4>
			        </div>
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
</body>
</html>

