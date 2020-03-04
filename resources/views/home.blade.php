@extends('layouts.app')

@section('content')
    <div  id="app-1">
        @can('viewAny','App\Models\User')        
            <div class="uk-container uk-container-small uk-margin-xlarge-top">
                <div class="uk-margin uk-grid-small uk-child-width-auto uk-margin-small-top uk-margin-small-left">
                    <label>
                        <input class="a uk-radio" type="radio" value="0" v-model="checked"> 
                            Unchecked
                    </label>
                    <label>
                        <input class="a uk-radio" type="radio" value="1" v-model="checked "> 
                            Checked
                    </label>
                </div>
            </div>
        @endcan 

        <div class="uk-container uk-container-small">
            <div v-if="last > 1">
                <ul class="uk-pagination uk-flex-center" uk-margin>
                    <li class="uk-padding-remove">
                        <button v-if="current > 1" v-on:click="current=(current-1)">
                            <span uk-pagination-previous></span>
                        </button>
                    </li>
                    <li class="uk-padding-remove">
                        <button v-on:click="current=1">
                            <span  class="uk-active" v-bind:class="{ active: (1==current)}">
                                1
                            </span>
                        </button>
                    </li>
                    <li class="uk-padding-remove uk-disabled"  v-if="firstbreak">
                        <button>
                            <span>
                                ...
                            </span>
                        </button>
                    </li>
                        <div class="uk-padding-remove" v-for="since in untill" v-if="since>untill-calls"> 
                            <li>
                                <button v-on:click="current=since">
                                    <span  class="uk-active" v-bind:class="{ active: (since==current)}">
                                        @{{since}}
                                    </span>
                                </button>
                            </li>
                        </div> 
                    <li class="uk-padding-remove uk-disabled"  v-if="lastbreak">
                        <button>
                            <span>
                                ...
                            </span>
                        </button>
                    </li>
                    <li class="uk-padding-remove">
                        <button v-on:click="current=last">
                            <span  class="uk-active" v-bind:class="{ active: (last==current)}">
                                @{{last}}
                            </span>
                        </button>
                    </li>
                    <li class="uk-padding-remove">
                        <button v-if="current < last" v-on:click="current=(current+1)">
                            <span uk-pagination-next></span>
                        </button>
                    </li>
                </ul> 
            </div>           
            <div v-for="cv in cvs"> 
                <div class="uk-card uk-card-default uk-card-hover uk-width-1-1 uk-margin-top">
                    <div class="uk-card-body">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            <div class="uk-width-expand">
                                <h3 class="uk-card-title uk-margin-remove-bottom">
                                    <a v-bind:href="route + cv.id">@{{cv.profession}}</a>
                                    <span>@{{cv.salary}}</span><i>@{{cv.currency}}</i>
                                </h3>
                                <p class="uk-text-meta uk-margin-remove-top">@{{cv.created_at}}</p>
                                <div uk-grid>
                                    <div class="uk-width-auto@m">
                                        @{{cv.first_name + ' ' + cv.last_name}}
                                    </div>
                                    <div class="uk-width-auto@m">
                                        Age: @{{cv.age}}
                                    </div>
                                    <div class="uk-width-auto@m">
                                        City: @{{cv.city}}
                                    </div>
                                </div>
                                <div class="uk-grid uk-margin-remove-top">
                                    <div class="uk-width-auto@m">
                                        Education: @{{cv.education}}
                                    </div>
                                    <div class="uk-width-auto@m">
                                        Work: @{{cv.schedule}}
                                    </div>
                                </div>
                            </div>
                            <div v-if="cv.image_link"> 
                                <div class="uk-width-auto" uk-grid uk-lightbox="animation: slide">
                                    <a class="uk-inline" v-bind:href="'/images/' + cv.image_link" data-caption="Photo on CV-market">
                                        <img width="100" v-bind:src="'/images/' + cv.image_link">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="last > 1" class="uk-margin-top">
                <ul class="uk-pagination uk-flex-center" uk-margin>
                    <li class="uk-padding-remove"><button v-if="current > 1" v-on:click="current=(current-1)"><span uk-pagination-previous></span></button></li>
                        <div class="uk-padding-remove" v-for="page in last"> 
                            <li>
                                <button v-on:click="current=page">
                                    <span  class="uk-active" v-bind:class="{ active: (page==current)}">
                                        @{{page}}
                                    </span>
                                </button>
                            </li>
                        </div> 
                    <li class="uk-padding-remove"><button v-if="current < last" v-on:click="current++"><span uk-pagination-next></span></button></li>
                </ul> 
            </div>      
        </div>
    </div>
    <script src="https://unpkg.com/vue"></script>
    <script type="text/javascript">
        new Vue({
            el: "#app-1",
            data: {
                checked: 0,
                cvs: '',
                route: "/cv/",
                current: 1, //current_page
                firstUrl: '', //first_page_url
                last: 1, //last_page
                lastUrl: '', //last_page_url
                nextUrl: '', //next_page_url
                path: '', //path
                preUrl: '', //pre_page_url
                calls: 3,
                untill: 4
            },
            methods: {
                change: async function() {
                    let url = `/home/show/?checked=${this.checked}&page=${this.current}`;
                    let response = await fetch(url);
                    let result = await response.json();
                    //this.checked = result.checked;
                    this.cvs = result.cvs.data;

                    this.pagination(result.cvs);
                },
                pagination: function(result) {
                    this.current = result.current_page;
                    this.firstUrl = result.first_page_url;
                    this.last = result.last_page;
                    this.lastUrl = result.last_page_url;
                    this.nextUrl = result.next_page_url;
                    this.path = result.path;
                    this.preUrl = result.prev_page_url;

                    if (this.last - this.calls < 2) {
                        this.calls = this.last - 2;
                        this.untill = this.calls +1;  
                    }
                }
            },
            watch: {
                checked: function () {
                    this.current = 1;
                    this.change();
                },
                current: function () {
                    if (this.current == 1) {
                        this.untill = this.calls + 1;
                    }
                    if (this.current == this.last) {
                        this.untill = this.last - 1;
                    }
                    if (this.untill == this.current && this.untill < this.last - 1) {
                        this.untill++;
                    }
                    if (this.untill - this.calls > 1 && this.untill-this.calls + 1 == this.current) {
                        this.untill--;
                    }
                    console.log(this.untill);

                    this.change();
                }    
            },
            created: function () {
                this.change();
            },
            computed: {
                firstbreak: function () {
                    return (this.untill - this.calls) > 1;
                },
                lastbreak: function () {
                    return this.current < (this.last - this.calls);
                }
            }     
        })           
    </script>
@endsection


