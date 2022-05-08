@extends('layouts.sidebarPages')

    @section('content')
        <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
            <div class="app-content content">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <section class="">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update')}}" >
                                @csrf
                                <!-- Row of the page contents -->
                                <div class="row mt-5 mb-5">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="box-shadow-2 p-0">
                                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                                <div class="card-header border-0 pb-0">
                                                    <div class="card-title mb-2">
                                                        <h3 class="crt-acc"><b>General Information</b></h3>
                                                    </div>                                     
                                                </div>
                                                <!-- Contact Form -->
                                                <div class="mt-1 container">
                                                    <div class="form-group">
                                                        <input value="{{Auth::user()->name}}" name="name" class="form-control border-cont-form-orange" type="text" placeholder="Full Name" id="userinput1" required>
                                                    </div>
                                                    <div class="form-group mt-3 mb-2">                                                    
                                                        <div class="input-group">                                                        
                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                                <input value="Male" {{Auth::user()->sex == 'Male' ? 'checked' : '' }} type="radio" name="sex" class="custom-control-input" id="yes" required>
                                                                <label class="custom-control-label" for="yes">Male</label>
                                                            </div>
                                                            <div class="d-inline-block custom-control custom-radio">
                                                                <input value="Female" {{Auth::user()->sex == 'Female' ? 'checked' : '' }} type="radio" name="sex" class="custom-control-input" id="no">
                                                                <label class="custom-control-label" for="no">Female</label>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <input value="{{Auth::user()->alias}}" name="alias" class="form-control border-cont-form-orange" type="text" placeholder="Alias" id="userinput" required>
                                                    </div>                                                
                                                    <div class="form-group mt-3 mb-4">
                                                        <p><strong>Visibility</strong></p>
                                                        <div class="input-group">                                                        
                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                                <input value="Public" {{Auth::user()->visibility == 'Public' ? 'checked' : '' }} type="radio" name="visibility" class="custom-control-input" id="yes1" required>
                                                                <label class="custom-control-label" for="yes1">Public</label>
                                                            </div>
                                                            <div class="d-inline-block custom-control custom-radio">
                                                                <input value="Private" {{Auth::user()->visibility == 'Private' ? 'checked' : '' }} type="radio" name="visibility" class="custom-control-input" id="no1">
                                                                <label class="custom-control-label" for="no1">Private</label>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3">
                                                        <p><b>"Public"</b> visibility means that other users who are not your friends will see your <b>Full Name</b> in the friend's suggestion section and whenever You comment on blog posts.</p>
                                                        <p><b>"Private"</b> visibility means that other users who are not your friends will see your <b>Alias</b> in the friend's suggestion section and whenever You comment on blog posts.</p>
                                                        </div>
                                                    </div>                                                                                                                                           
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row of the page contents -->
                                <div class="row mt-5 mb-5">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="box-shadow-2 p-0">
                                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                                <div class="card-header border-0 pb-0">
                                                    <div class="card-title mb-0">
                                                        <h3 class="crt-acc"><b>Age Filter</b></h3>
                                                    </div>                                            
                                                </div>
                                                <div class="form-group mt-1 mb-0 p-2">
                                                    <div class="input-group">
                                                        <div class="mb-3">
                                                            <label id="labelTemp"> {{Auth::user()->age}} </label>
                                                        </div>
                                                        <input id="bar" name="age" type="range" min="25" max="55" step="10" val="25" class="slider"/>
                                                        <input id="slider" type="hidden" name="age" value="Between 25 and 35" />                                                                                                
                                                    </div>
                                                    <div class="mt-2 p-1">
                                                        <p><i>Slide the orange ball above to the left or right to select your age range.</i></p>
                                                    </div> 
                                                </div>
                                                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row of the page contents -->
                                <div class="row mt-5 mb-5">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="box-shadow-2 p-0">
                                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                                <div class="card-header border-0 pb-0">
                                                    <div class="card-title mb-2">
                                                        <h3 class="crt-acc"><b>Location</b></h3>
                                                        @if(Auth::user()->state && Auth::user()->country !== null)
                                                            <p>Current Location: <b> {{Auth::user()->state}}, {{Auth::user()->country}} </b></p>
                                                            <button onclick="toggleCheck()" type="button" class="btn btn-sm  btn-outline-warning">Change Location</button>

                                                            <div id="state-form" class="mt-1 container d-none">
                                                                <div class="form-group col-md-6">                                                    
                                                                    <select onchange="print_state('state',this.selectedIndex);" id="country" name ="country" class="form-control"></select>
                                                                        
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">                                                    
                                                                    <select name ="state" id ="state" class="form-control"></select>
                                                                        
                                                                    </select>
                                                                </div>                                                                                                                                          
                                                            </div>
                                                        @endif
                                                    </div>                                            
                                                </div>
                                                @if(empty(Auth::user()->state) && empty(Auth::user()->country))
                                                    <div class="mt-1 container">
                                                        <div class="form-group col-md-6">                                                    
                                                            <select onchange="print_state('state',this.selectedIndex);" id="country" name ="country" class="form-control"></select>
                                                                {{-- <option value="{{Auth::user()->country}}">{{Auth::user()->country}}</option> --}}
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">                                                    
                                                            <select name ="state" id ="state" class="form-control"></select>
                                                                {{-- <option>{{Auth::user()->state}}</option> --}}
                                                            </select>
                                                        </div>                                                                                                                                          
                                                    </div>
                                                @endif

                                                <div id="userInputBio"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-5 mb-5">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="box-shadow-2 p-0">
                                            <div  class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                                <div class="card-header border-0 pb-0">
                                                    <div class="card-title mb-0">
                                                        <h3 class="crt-acc"><b>Bio</b></h3>
                                                    </div>                                            
                                                </div>
                                                <div class="form-group mt-1 mb-0 p-2">                                                                                                
                                                    <textarea  rows="2" class="form-control border-cont-form-orange editor" name="bio" placeholder="Bio">{!!Auth::user()->bio!!}</textarea>                                                
                                                        <div class="mt-2 p-1">
                                                            <p><i>Bio.</i></p>
                                                        </div> 
                                                </div>
                                                    <div id="userInputWork"></div>                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5 mb-5">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="box-shadow-2 p-0">
                                            <div  class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                                <div class="card-header border-0 pb-0">
                                                    <div class="card-title mb-0">
                                                        <h3 class="crt-acc"><b>Work</b></h3>
                                                    </div>                                            
                                                </div>
                                                <div class="form-group mt-1 mb-0 p-2">                                                                                                    
                                                    <textarea id="userinput8" rows="2" class="form-control border-cont-form-orange editor" name="work" placeholder="Work">{!!Auth::user()->work!!}</textarea>
                                                        <div class="mt-2 p-1">
                                                            <p><i>Work.</i></p>
                                                        </div> 
                                                </div>                                                                          
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5 mb-5">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="box-shadow-2 p-0">
                                            <div id="userInputEdu" class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                                <div class="card-header border-0 pb-0">
                                                    <div class="card-title mb-0">
                                                        <h3 class="crt-acc"><b>Education</b></h3>
                                                    </div>                                            
                                                </div>
                                                <div class="form-group mt-1 mb-0 p-2">                                                                                                   
                                                    <textarea id="userinput8" rows="2" class="form-control border-cont-form-orange editor" name="education" placeholder="Education">{!!Auth::user()->education!!}</textarea> 
                                                        <div class="mt-2 p-1">
                                                            <p><i>Education.</i></p>                                                        
                                                        </div> 
                                                </div>
                                                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(count($user->images) < 1)
                                <div class="row mt-5 mb-5">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="box-shadow-2 p-0">
                                            <div id="userInputEdu" class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                                <div class="card-header border-0 pb-0">
                                                    <div class="card-title mb-0">
                                                        <h3 class="crt-acc"><b>Galery Images</b> (<i>Optional</i> )</h3>
                                                        <p><i>Maximum Images number(4)</i></p>                                                   
                                                    </div>                                            
                                                </div>
                                                <div class="form-group mt-1 mb-0 p-2">
                                                    <div class="input-group">
                                                        <div class="mb-3">                                                                                                                                                                            
                                                            <input name="image_url[]" type="file" multiple/>                                                            
                                                        </div>                                                    
                                                    </div>                                                 
                                                </div>                                                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- Row of the page contents -->
                                <div class="row mt-5 mb-5">
                                    <div class="col-md-8 offset-md-2">                                                                                                                    
                                        <div class="mt-1 container">
                                            <div class="form-group col-md-12">
                                                <button id="submitForm" type="submit" class="btn btn-orange btn-block">Submit</button>
                                            </div>                                                                                                                                                                                    
                                        </div>                                                                                                                        
                                    </div>
                                </div>
                            </form>
                        </section>                        
                    </div>
                </div>
            </div>

            
        
        <script src="{{ asset('countries/countries.js')}}"></script>
        <script>
            
            function toggleCheck(){
                $('#state-form').toggleClass('d-none');
            }  

            $(function(){
                $("#upload_link").on('click', function(e){
                    e.preventDefault();
                    $("#upload:hidden").trigger('click');
                });
            });

            
            print_country("country");

            var allEditors = document.querySelectorAll('.editor') ;
            for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i], {
                toolbar: []
                });
            }
           
        
        </script>
    @endsection