@extends('layouts.default')

@section('title')
     登录
@stop

@section('content')
<div class="col-md-offset-2 col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>
                登录
            </h5>
        </div>
        <div class="panel-body">
            @include('shared._errors')
            <div class="col-md-12">
                {!! Form::open(['method' => 'POST', 'route' => 'login', 'class' => 'form-horizontal']) !!}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', '邮箱') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required','id'=>'name']) !!}
                    <small class="text-danger">
                        {{ $errors->first('email') }}
                    </small>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', '密码') !!}
                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required','id'=>'password']) !!}
                    <small class="text-danger">
                        {{ $errors->first('password') }}
                    </small>
                </div>

                <div id="embed-captcha"></div>
                <p id="wait" class="show">正在加载验证码......</p>
                <p id="notice" class="hide">请先完成验证</p>


                <div class="checkbox">
                    <label>
                        <input name="remember" type="checkbox">
                            记住我
                        </input>
                    </label>
                </div>
                <div class="btn-group pull-right">
                    {!! Form::submit("登录", ['class' => 'btn btn-success','id'=>'embed-submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <hr>
                <p>
                    还没账号？
                    <a href="/signup">
                        现在注册！
                    </a>
                </p>
            </hr>
        </div>
    </div>
</div>


@stop


@push('scripts')
    {{-- 引入sweetalter --}}
{{--   <script type="text/javascript">
         $(document).ready(function(){
            $('.btn-del-address').click(function(e){
              //get address id
              var id=$(this).data('id');

              swal({
                 title:"确认要删除该地址？",
                 icon:"warning",
                 buttons:['取消','确定'],
                 dangerMode:true,
              }).then(function(willDelete){
                  console.log(willDelete);
                  if(!willDelete){
                     return;
                  }
                  //call delete api
                  axios.delete('/user_addresses/' + id).then(function(){
                       //success reload index
                       window.location.href="/user_addresses";
                  });
              });
         });
       });
 
  </script> --}}

<script src="/js/gt.js"></script>
  <script>
      var handlerEmbed = function (captchaObj) {
          $("#embed-submit").click(function (e) {
              var validate = captchaObj.getValidate();
              if (!validate) {
                  $("#notice")[0].className = "show";
                  setTimeout(function () {
                      $("#notice")[0].className = "hide";
                  }, 2000);
                  e.preventDefault();
              }
          });
          // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
          captchaObj.appendTo("#embed-captcha");
          captchaObj.onReady(function () {
              $("#wait")[0].className = "hide";
          });
          // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
      };

      $.ajax({
          // 获取id，challenge，success（是否启用failback）
          url: "/api/get-check-user?t=" + (new Date()).getTime(), // 加随机数防止缓存
          type: "get",
          dataType: "json",
          success: function (data) {
              console.log(data);
              // 使用initGeetest接口
              // 参数1：配置参数
              // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
              initGeetest({
                  gt: data.gt,
                  challenge: data.challenge,
                  new_captcha: data.new_captcha,
                  product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                  offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                  // 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
              }, handlerEmbed);
          }
      });
      
  </script>
@endpush


@push('scripts')
    {{-- 为登录用户生成access_token --}}
    <script type="text/javascript">
       $('.form-horizontal').submit(function(e){
                 $.ajax({
                    type:'POST',
                    contentType: "application/json",
                    url:"/oauth/token",

                    data: JSON.stringify(
                          {
                             "username": $('#name').val(),
                             'password':$('#password').val(),
                             // "platform": "app",
                             "grant_type": "password",
                             "client_id": 2,
                             "client_secret": "{{ $client->secret }}",
                          }
                    ),

                    success(response) {                  
                       localStorage.setItem('access_token',response.access_token);
                    },

                    error(error){
                       console.log(error);
                    }
                 })
               // e.preventDefault();
       });
    </script>
@endpush


