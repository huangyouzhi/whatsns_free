<!--{template header}-->
<style>
.myverform{
padding:15px;
}
.myline{
min-height:30px;
    clear: both;
}
.form-group{
clear:both;
}
.text-left {
text-align:left;
}
.jieshaoinfo{
margin:20px auto;
}
#jieshao{
width:100%:
height:50px;
}
.fujianfule {
    position: relative;
    top: -52px;
    opacity: 0;
}
.m_search h3{
 margin:15px 15px 5px 15px;
 padding-bottom:10px;
 font-weight:600;
 border-bottom:solid 1px #ebebeb;
}
</style>
 <div class="m_search userspaceheader">

<h3>我的认证</h3>
</div>
<section class="ui-container">

<div class="myverform">

                    <form class="ui-form"  method="POST" id="vertify_form"  >

 <div class="ui-row myline">
          <p class="ui-col ui-col-25 ">当前状态:</p>
          <div class="ui-col ui-col-75">
                  {if !isset($vertify['msg'])}
                    未认证
          {else}
          {$vertify['msg']}
          {/if}
          {if $vertify['status']==2}
          <div style="color:#777"> 驳回原因:{$vertify['shibaiyuanyin']}</div>
          {/if}
          </div>
        </div>
      
         <div class="ui-row myline">
          <p class="ui-col ui-col-25 ">认证类型:</p>
          <div class="ui-col ui-col-75">
          {eval if ($setting['vertify_gerentip']==null||trim($setting['vertify_gerentip'])=='')$setting['vertify_gerentip']='个人';}
                        <span><input type="radio" value="0" {if $vertify['status']==0}disabled{/if}  class="normal_radio vertify_type" name="type" <!--{if isset($vertify['type'])&&(0 == $vertify['type'])}--> checked <!--{/if}-->/>{$setting['vertify_gerentip']} &nbsp;&nbsp;</span>
           {eval if ($setting['vertify_qiyetip']==null||trim($setting['vertify_qiyetip'])=='')$setting['vertify_qiyetip']='企业';}
                        <span><input type="radio" value="1" {if $vertify['status']==0}disabled{/if}  class="normal_radio vertify_type" name="type" <!--{if isset($vertify['type'])&&(1 == $vertify['type'])}--> checked <!--{/if}--> />{$setting['vertify_qiyetip']}</span>
          
          </div>
        </div>
 
   
        <div class="ui-row myline">
          <p class="ui-col ui-col-25 text-left ">真实姓名：</p>
          <div class="ui-col ui-col-75 ui-form-item ui-form-item-pure ui-border-b">

                <input type="text" name="name" id="name" {if $vertify['status']==0}disabled{/if} value="{if isset($vertify['name'])}$vertify['name']{/if}" placeholder="" class="form-control">
          
             <a href="#" class="ui-icon-close"></a>
          </div>
        </div>
 
       <div class="ui-row myline">
          <p class="ui-col ui-col-25 text-left ">身份证号码：</p>
          <div class="ui-col ui-col-75 ui-form-item ui-form-item-pure ui-border-b">

                <input type="text"  name="id_code" id="id_code"  {if $vertify['status']==0}disabled{/if} value="{if isset($vertify['id_code'])}$vertify['id_code']{/if}" placeholder="" class="form-control">
          
             <a href="#" class="ui-icon-close"></a>
          </div>
        </div>



      <div class="ui-row myline jieshaoinfo">
          <p class="text-left ">认证介绍:</p>
          <div class="">
            <textarea name="jieshao" id="jieshao" style="width:100%;height:50px;    border: solid 1px #ebebeb;" {if $vertify['status']==0}disabled{/if}  class="" >{if isset($vertify['jieshao'])}$vertify['jieshao']{/if}</textarea>

    
          </div>
        </div>


         <div class="form-group ">
          <p class="col-md-6 text-left ">附件一(必传):</p>
          <div class="col-md-12 uploadver">

							<a class="btn btn-mini btn-default">上传附件</a>

							<p class="text-hui">请提交对应的身份证或者组织机构代码证件扫描</p>
							<input  {if $vertify['status']==0}disabled{/if} name="attach1" type="file" class="fujianfule  collapse" onchange="previewImage(this)">
					  <img src='{if isset($vertify['zhaopian1'])}{SITE_URL}{$vertify['zhaopian1']}{/if}' id="vertify_img1" class="vertify_img {if isset($vertify['zhaopian1'])&&$vertify['zhaopian1']==''}hide{/if}"/>
          </div>
        </div>
               <div class="form-group">
          <p class="col-md-6 text-left ">附件二(可选):</p>
          <div class="col-md-12 uploadver">

							<a class="btn btn-mini btn-default">上传附件</a>

							<p class="text-hui">其它证明材料(图片格式)</p>
							<input  {if $vertify['status']==0}disabled{/if} name="attach2" type="file" class="fujianfule  collapse" onchange="previewImage1(this)">
					  <img src='{if isset($vertify['zhaopian2'])}{SITE_URL}{$vertify['zhaopian2']}{/if}' id="vertify_img2"  class="vertify_img {if isset($vertify['zhaopian2'])&&$vertify['zhaopian2']==''}hide{/if}"/>
          </div>
        </div>


         {if $vertify['status']!=0}
         <div class="form-group btnuploadver">
          <div class=" col-md-10">
           {if $vertify['status']==2}
 <input type="button" id="submit" name="submit" onclick="submitvertify()" class="ui-btn-lg ui-btn-danger" value="重新提交" data-loading="稍候...">
          {else}
          <input type="button" id="submit" name="submit" onclick="submitvertify()" class="ui-btn-lg ui-btn-danger" value="保存" data-loading="稍候...">
          {/if}

          </div>
        </div>
        {/if}

 </form>
 </div>
</section>
{if $vertify['status']!=0}
<script>

//类型切换
$("#vertify_form .vertify_type").click(function(){
	var _val=$(this).val();
	switch(_val){
	case '0':
		$("#vertify_form .change_name").html("真实姓名：");
		$("#vertify_form .change_idcode").html("身份证号码：");
		break;
	case '1':
		$("#vertify_form .change_name").html("企业名称:");
		$("#vertify_form .change_idcode").html("组织机构代码:");
		break;
	}
})

//提交资料
function submitvertify(){
	//认证类型
	var _type=$.trim($("input[name='type']:checked").val());
	//用户名
	var _name=$.trim($("#vertify_form #name").val());
	//身份证号码
	var _idcode=$.trim($("#vertify_form #id_code").val());
	//认证介绍
	var _jieshao=$.trim($("#vertify_form #jieshao").val());
	//认证附件图片
	var _vertifyimgfile=$.trim($("#vertify_img1").attr("src"));
	switch(_type){
	case '0':
		if(_name==''){
			alert("真实姓名不能为空");
			return false;
		}
		if(_idcode==''){
			alert("身份证号码不能为空");
			return false;
		}
		break;
	case '1':
		if(_name==''){
			alert("企业名称不能为空");
			return false;
		}
		if(_idcode==''){
			alert("组织机构代码证不能为空");
			return false;
		}
		break;
	}
	if(_jieshao==''){
		alert("认证介绍不能为空");
		return false;
	}

	if(_vertifyimgfile==''){
		alert("附件一认证材料不能为空");
		return false;
	}
	//认证附件图片2
	var _vertifyimgfile2=$.trim($("#vertify_img2").attr("src"));

	var data={
			type:_type,
			name:_name,
			idcode:_idcode,
			jieshao:_jieshao,
			zhaopian1:_vertifyimgfile,
			zhaopian2:_vertifyimgfile2
	}
	function success(data){
		alert(data.result);
		if(data.code=='200'){
			setTimeout(function(){
				window.location.reload();
			},1000);

		}
	}
	var _posturl="{url user/ajaxvertify}";
	ajaxpost(_posturl,data,success);
}

//图片上传预览    IE是用了滤镜。
function previewImage(file)
{
  var MAXWIDTH  = 260;
  var MAXHEIGHT = 180;

  if (file.files && file.files[0])
  {


      var reader = new FileReader();
      reader.onload = function(evt){

    	  var canvas=document.createElement("canvas");
          var ctx=canvas.getContext("2d");
          var image=new Image();
          image.src=evt.target.result;
          image.onload=function(){
              var cw=image.width;
              var ch=image.height;
              var w=image.width;
              var h=image.height;
              canvas.width=w;
              canvas.height=h;
              if(cw>800&&cw>ch){
                  w=800;
                  h=(800*ch)/cw;
                  canvas.width=w;
                  canvas.height=h;
              }
              if(ch>800&&ch>cw){
                  h=800;
                  w=(800*cw)/ch;
                  canvas.width=w;
                  canvas.height=h;

              }

              ctx.drawImage(image,0,0,w,h);
              var _src=canvas.toDataURL("image/png",1);
              console.log(_src);

    	 $("#vertify_img1").attr("src",_src).removeClass("hide");


      }
      }
      reader.readAsDataURL(file.files[0]);
  }


}
//图片上传预览    IE是用了滤镜。
function previewImage1(file)
{
  var MAXWIDTH  = 260;
  var MAXHEIGHT = 180;

  if (file.files && file.files[0])
  {


      var reader = new FileReader();
      reader.onload = function(evt){

    	  var canvas=document.createElement("canvas");
          var ctx=canvas.getContext("2d");
          var image=new Image();
          image.src=evt.target.result;
          image.onload=function(){
              var cw=image.width;
              var ch=image.height;
              var w=image.width;
              var h=image.height;
              canvas.width=w;
              canvas.height=h;
              if(cw>800&&cw>ch){
                  w=800;
                  h=(800*ch)/cw;
                  canvas.width=w;
                  canvas.height=h;
              }
              if(ch>800&&ch>cw){
                  h=800;
                  w=(800*cw)/ch;
                  canvas.width=w;
                  canvas.height=h;

              }

              ctx.drawImage(image,0,0,w,h);
              var _src=canvas.toDataURL("image/png",1);
              console.log(_src);

    	 $("#vertify_img2").attr("src",_src).removeClass("hide");


      }
      }
      reader.readAsDataURL(file.files[0]);
  }


}
</script>
{/if}
<div class="modal fade" id="myLgModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div id="dialogcate">
        <form name="editcategoryForm" action="{url question/movecategory}" method="post">
            <input type="hidden" name="qid" value="{if isset($question['id'])}$question['id']{/if}" />
            <input type="hidden" name="category" id="categoryid" />
            <input type="hidden" name="selectcid1" id="selectcid1" value="{if isset($question['cid1'])}$question['cid1']{/if}" />
            <input type="hidden" name="selectcid2" id="selectcid2" value="{if isset($question['cid2'])}$question['cid2']{/if}" />
            <input type="hidden" name="selectcid3" id="selectcid3" value="{if isset($question['cid3'])}$question['cid3']{/if}" />
            <table class="table table-striped">
                <tr valign="top">
                    <td width="125px">
                        <select  id="category1" class="catselect" size="8" name="category1" ></select>
                    </td>
                    <td align="center" valign="middle" width="25px"><div style="display: none;" id="jiantou1">>></div></td>
                    <td width="125px">
                        <select  id="category2"  class="catselect" size="8" name="category2" ></select>
                    </td>
                    <td align="center" valign="middle" width="25px"><div style="display: none;" id="jiantou2">>>&nbsp;</div></td>
                    <td width="125px">
                        <select id="category3"  class="catselect" size="8"  name="category3" ></select>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                    <span>
                    <input  type="button" class="btn btn-success" value="确&nbsp;认" onclick="add_category();"/></span>
                    <span>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    </span>
                    </td>

                </tr>
                 <tr>
                    <td colspan="5">
                     <ul class="taglist tag">

                     </ul>
                    </td>

                </tr>
            </table>
        </form>
    </div>
    </div>
  </div>
</div>
<!--用户中心结束-->
{if $vertify['status']!=1}
<script type="text/javascript">
var catsetnum={$setting['cansetcatnum']};

$(".taglist").html($("#cate_view").html());


</script>
{/if}
<!--{template footer}-->