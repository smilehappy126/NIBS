@extends('layouts.layout')
@section('title', '管理者模式')
@section('css')
<style type="text/css">
/*PC CSS Section*/
@media screen and (min-width: 900px){
    .Mobilesection{
        display: none;
    }

    .TopTitle{
        background-color: transparent;
        font-family: DFKai-sb;
        font-size: 80px;
        text-align: center;
    }
    .FormButton{
		border: 0px;
		border-radius: 8px;
		background-color: pink;
		left: 0px;
		right: 0px;
		width: 100%;
		height: 100%;
		bottom: :0;
		float: left;
		font-family: Microsoft JhengHei;
		font-size: 80px;
	}
	.FormButton:hover{
		background-color: #FF8888;
	}
    .searchButton{
		width: 41px;
    	height: 28px;
    	font-size: 12px;
 	    font-weight: bold;
	    text-align: left;
	    border: 0px;
	    transition: 0.3s;
	    cursor: pointer;
	    background-color: transparent;
	    font-family:  Microsoft JhengHei;
	    border-radius: 5px;	
	}
	.searchButton:hover{
	    background-color: #DDDDDD;
    }
    .searchcontent{
    	height: 35px;
    	font-size: 20px;
    }
    .notice{
    	font-family: Microsoft JhengHei;
    	font-weight: bolder;
    	font-size: 100px;
    	color: #FF3333;
    }
}
/*End of PC CSS Section*/

/*Mobile CSS Section*/
@media screen and (max-width: 900px) and (min-width: 300px){
    .PCsection{
      display: none;
    }

    .TopTitle{
        background-color: transparent;
        font-family: DFKai-sb;
        font-size: 60px;
        text-align: center;
    }
    .FormButton{
        border: 0px;
        border-radius: 8px;
        background-color: pink;
        left: 0px;
        right: 0px;
        width: 100%;
        height: 100%;
        bottom: :0;
        float: left;
        font-family: Microsoft JhengHei;
        font-size: 40px;
    }
    .FormButton:hover{
        background-color: #FF8888;
    }
    .searchButton{
        width: 41px;
        height: 28px;
        font-size: 12px;
        font-weight: bold;
        text-align: left;
        border: 0px;
        transition: 0.3s;
        cursor: pointer;
        background-color: transparent;
        font-family:  Microsoft JhengHei;
        border-radius: 5px; 
    }
    .searchButton:hover{
        background-color: #DDDDDD;
    }
    .searchcontent{
        height: 35px;
        font-size: 20px;
    }
    .notice{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 100px;
        color: #FF3333;
    }
}

/*End of Mobile CSS Section*/

</style>
@stop

@section('content')
<div class="container" style="width: 100%;">
    <!-- PC Section -->
    <div class="PCsection">
        <div class="TopTitle">
          管理者專區
        </div>
        @if(Auth::check())
    		@if(Auth::user()->level === '管理員')
    			<div class="content" style="position: relative;">
    				<table class="table" style="border: 0px; height: 100%; table-layout: fixed; text-align: center;">
    					<tr>
    						<th>
    							<button class="FormButton" type="button" data-toggle="modal" data-target="#SearchModal">歷史紀錄</button>
    						</th>
    						<th>
    						  <form action=" {{asset('/admin/userlists')}} " method="get" >{{ csrf_field() }}
    						      <button class="FormButton" type="submit">使用者清單</button>
    						  </form>
    						</th>
    					</tr>
    					<tr>
    						<th>
    							<form action=" {{asset('/admin/rule')}} " method="get"> {{ csrf_field() }}
                                    <button class="FormButton" type="submit">編輯條例</button>
                                </form>
    						</th>
    						<th>
    							<button class="FormButton" type="button">其他功能</button>
    						</th>
    					</tr>
    				</table>
    			</div>
    		@endif
    	@endif
    	
    	@unless(Auth::user()->level === '管理員')
    		<div class="content">
    			<label class="notice">只限管理員使用，請先登入!!!</label>
    		</div>
    	@endunless
    </div>
    <!-- End of PC Section -->

    <!-- Mobile Section -->
    <div class="Mobilesection">
        <div class="TopTitle">
          管理者專區
        </div>
        @if(Auth::check())
            @if(Auth::user()->level === '管理員')
                <div class="content" style="position: relative;">
                    <table class="table" style="border: 0px; height: 100%; table-layout: fixed; text-align: center;">
                        <tr>
                            <th>
                                <button class="FormButton" type="button" data-toggle="modal" data-target="#SearchModal">歷史紀錄</button>
                            </th>
                            <th>
                            <form action=" {{asset('/admin/userlists')}} " method="get" >{{ csrf_field() }}
                                <button class="FormButton" type="submit">使用者清單</button>
                            </form>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <form action=" {{asset('/admin/rule')}} " method="get"> {{ csrf_field() }}
                                    <button class="FormButton" type="submit">編輯條例</button>
                                </form>
                            </th>
                            <th>
                                <button class="FormButton" type="button">其他功能</button>
                            </th>
                        </tr>
                    </table>
                </div>
            @endif
        @endif
        
        @unless(Auth::user()->level === '管理員')
            <div class="content">
                <label class="notice">只限管理員使用，請先登入!!!</label>
            </div>
        @endunless
    </div>
    <!-- End of Mobile Section -->


</div>
<!-- End of Container -->

<!-- ↓↓↓ Modal Section ↓↓↓ -->
    <!-- Search Modal -->
        <div id="SearchModal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" style="opacity: 0.9;">
            <div class="modal-dialog">

                    <!-- Search Modal content-->
                    <div class="modal-content">
                        <!-- Begin of Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div id="SearchPage">
                               <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei">搜尋 Search</h4>
                            </div>
                        </div>
                        <!-- End of Modal Header -->

                        <!-- Begin of Modal Body -->
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <form action="{{ asset ('/admin/searchall')}}" method="post" style="width: 100%;">{{ csrf_field()}}
										<label style="font-family: Microsoft JhengHei; height: 50px;font-size: 30px;">搜尋:&nbsp</label>
                                        <input  class="searchcontent" name="searchcontent" id="searchcontent" type="text"  placeholder="請輸入內容...."  value="" style="width: 70%;" autofocus>
		                        </div>    
                            </div>
                        </div>

                        <!--  End of Modal Body -->

                        <!-- Begin of Modal Footer -->
                        <div class="modal-footer">
                              <div class="form-group">
                                    <button type="submit" class="btn btn-default" style="font-size: 20px; font-weight: bold;">Search</button>
                                    <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" data-dismiss="modal">Close</button>
                              </div>
                        </div>
                        <!-- End of Modal Footer -->
                                </form>
                    </div>
                    <!-- End of Search Modal Conent -->
            </div>
        </div>        
        <!-- End of Search Modal -->
<!-- ↑↑↑ End of Modal Section ↑↑↑ -->


@endsection

@section('js')

@stop