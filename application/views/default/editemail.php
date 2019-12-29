<!--{template header}-->

<!--用户中心-->


    <div class="container person">

              <div class="row " style="margin-top: 20px;">
        <div class="col-md-6">
         <!--{template side_useritem}-->
        </div>
           <div class="col-md-16">
           
 <form class="form-horizontal"  action="{url user/editemail}" method="post">

 <input type="hidden" name="formkey" id="formkey" value="{$_SESSION['formkey']}" >
   <div class="form-group">
     <h4>邮箱修改/激活</h4>
     <hr>
      <div class="alert-danger alert">
               {if $user['active']==0}
               邮箱没有激活
               {else}
               邮箱已经激活
               {/if}
            </div>
          <p class="col-md-4 ">邮箱地址：</p>
          <div class="col-md-8">
            <input type="text" name="email" id="email" autocomplete="off" value="{$user['email']}" placeholder="" class="form-control">
          </div>
           {if $user['active']==0}
           <div class="col-md-6">
             <button type="button" id="sendvertifile"  class="btn btn-success width120">邮箱激活验证发送</button>
           </div>
            {/if}

        </div>

      <div class="padding-left:15px;">
       <!--{template code}-->
       </div>


        <div class="form-group">
          <div class=" col-md-10">
            {if $user['active']==0}
                <input type="submit" name="submit" id="submit" class="btn btn-success" value="保存并激活" data-loading="稍候...">
               {else}
               <input type="submit" name="submit" id="submit" class="btn btn-success" value="修改并重新激活" data-loading="稍候...">
               {/if}

                  </div>
        </div>

 </form>
           </div>
           

            </div>

        </div>

   



<div class="modal fade" id="modeltip">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">邮件发送提示</h4>
    </div>
    <div class="modal-body">
      <p class="messagetip"></p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>

    </div>
  </div>
</div>
</div>
<!--用户中心结束-->
  {if $user['active']==0}
<script>
$("#sendvertifile").click(function(){

   var _formkey=$("#formkey").val();
   var email='{$user['email']}';
   if($.trim(email)==''||$.trim(email)=='null'||email=='undefined'){
	   alert("您还没设置过邮箱，请先点击保存按钮保存邮箱");
	   return false;
   }
   if(confirm("您将要激活{$user['email']},如果不想激活当前邮箱，请先修改保存在激活，系统将会发送激活邮件")){
    $.ajax({
        //提交数据的类型 POST GET
        type:"POST",
        //提交的网址
        url:'{url user/sendcheckmail}',
        data:{formkey:_formkey},
        //返回数据的格式
        datatype: "text",//"xml", "html", "script", "json", "jsonp", "text".

        //成功返回之后调用的函数
        success:function(data){
        	$(".messagetip").html(data);
          $("#modeltip").modal("show");

        }   ,

        //调用出错执行的函数
        error: function(){
            //请求出错处理
        }
    });
   }
})
</script>
{/if}

<!--{template footer}-->