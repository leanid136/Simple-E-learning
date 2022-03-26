
  @extends('layouts/front-layout')
  @section('frontend-content')  
  
  <script src="{{ asset('js/aplayer/audio.min.js') }}"></script>
  <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
  </script>	
  
	<section id="content">
    <!--===== Start Quran Section ======-->
        <section class="profile quran-library">
            <div class="container">
                <div class="section-title">
                    <h3>{{trans('library.Quran_Library')}}</h3>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        
						<div class="student-section">
							<ul class="nav nav-tabs quranmenu active">
							  @if($quranmenudata -> count() > 0)
								@foreach($quranmenudata as $key=>$data)
								<li>
								  <a href="/quran/{{$data->id}}">
											{{$data->menu_name}}
										</a>
									</li>
								  
								@endforeach
							  @else
								<li class="active">
									{{trans('library.There_is_no_Menu')}}!
								</li>
							  @endif
							</ul>
						</div>                        
						
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-12">

                        <div class="student-section-content card">

                            <div class="tab-content">
                                <div>
                                    <div class="section-title bg-blue">
                                        <h3>{{$subcategoryname->sub_cat_name}}</h3>
                                    </div>
									
                                    <div class="library-item">
                                        <ul class="list-unstyled no-margin no-padding">
                                            <div class="no-margin no-padding row">
												
											@if($quranitemdata->count() > 0)											@foreach($quranitemdata as $list)				
												  <li class="col-md-3 col-sm-4 col-xs-12">
                                                    <div class="card hoverable" data-toggle="tooltip" title="" data-original-title="Surah Al-Fatihah ( The Opening )">
                                                        <a href=""><img src="{{ asset('images/library/book.png') }}" class="img-responsive align-center" alt=""></a>
                                                        <span class="text-overflow">{{$list->item_name}} </span>
                                                        <div id="jp_container_514" class="jp_container_1">
															<a class="common-class btn bg-info waves-effect jp-play" id="play-button" onclick="openAudioPlayer({{$list->id}})"><i class="fa fa-play"></i>{{trans('library.Play')}}</a>
															<a id="close-button" onclick="pauseAudionPlayer()" class="btn bg-warning waves-effect jp-pause" style="display: none;">{{trans('library.Pause')}}</a>
														</div>
													</div>
												  </li>
												@endforeach
												@else
											<li class="col-md-12 col-sm-12 col-xs-12">
												{{trans('library.There_is_no_Data')}}!
											</li>
											@endif
											</div>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </section>

    <!--===== End Quran Section ======-->

    </section>
	<script  src="{{ asset('js/aplayer/quran-audio-play.js') }}" type="text/javascript">	</script>
  @stop  
	