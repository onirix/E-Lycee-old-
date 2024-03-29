@extends('panelViews::master')
@section('bodyClass')
login
@stop
@section('body')
    <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    
                    <div class="mes-box ">
                    @if($mesType=='error')<div class="error-box animated fadeInDown"><span class="ic-caution"></span> {{$message}}</div>@endif  
                    @if($mesType=='info') <div class="info-box animated fadeInDown">{{$message}}</div>@endif
                    </div>
                    
                    <div class="login-panel panel panel-default animated fadeInDown">
                     
                        <div class="panel-heading">
                            @if($mesType=='message') <h3 class="panel-title">{{$message}}</h3>  @endif
                        </div>
                        <div class="panel-body">
                            <div class="logo-holder">
                                <img src="{{asset(Config::get('panel::config.logo'))}}" />
                            </div>
                            {{ Form::open(array('url' => 'panel/login')) }}
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="UserName" name="email" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                        <label class="pull-right">
                                            <a href="remind"> Forgot Password</a>
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit"  class="btn btn-lg btn-success btn-block" value="Login">
                                </fieldset>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
    </div>
@stop

