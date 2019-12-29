<link rel="stylesheet" media="all" href="{SITE_URL}static/css/widescreen/css/space.css" />
  <div class="main-top">
  <a class="avatar">
    <img src="{$user['avatar']}" alt="240" class="myavatar">
     <img src="{SITE_URL}static/images/zxj.png"  onclick="window.location.href='{url user/editimg}'" class="usereditavatar" title="修改头像" alt="240">
</a>
    <a class="btn btn-success  follow" href="{url user/profile}"><i class="fa fa-gear"></i><span>个人设置</span></a>


  <div class="title">
    <a class="name" >{$user['username']}
     {if $user['author_has_vertify']!=false}<i class="fa fa-vimeo {if $user['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  " data-toggle="tooltip" data-placement="right" title="" {if $user['author_has_vertify'][0]=='0'}data-original-title="个人认证" {else}data-original-title="企业认证" {/if} ></i>{/if}
    </a>
  </div>
  <div class="mysignnature">{if $user['signature']}$user['signature']{else}设置签名让别人了解你{/if}<i title="修改个人签名" onclick="window.location.href='{url user/profile}'" class="fa fa-edit hand" style="margin-left:5px;"></i></div>
  <div class="info">
    <ul>
      <li>
        <div class="meta-block">
          <a href="{url user/answer/1}">
            <p>{$user['answers']}</p>
            回答 <i class="fa fa-angle-right"></i>
</a>        </div>
      </li>
      <li>
        <div class="meta-block">
          <a href="{url user/ask/1}">
            <p>{$user['questions']}</p>
            提问 <i class="fa fa-angle-right"></i>
</a>        </div>
      </li>
        <li>
        <div class="meta-block">
         <a href="{url topic/userxinzhi/$user['uid']}">
            <p>{$user['articles']}</p>
            文章 <i class="fa fa-angle-right"></i>
</a>        </div>
      </li>
      <li>
        <div class="meta-block">

            <p>{$user['followers']}</p>
            粉丝
       </div>
      </li>
      <li>
        <div class="meta-block">

            <p>{$user['attentions']}</p>
            关注用户
       </div>
      </li>
      <li>
        <div class="meta-block">
          <p>{$user['supports']}</p>
          <div>赞同</div>
        </div>
      </li>
          <li>
        <div class="meta-block">
          <p>{$user['credit1']}</p>
          <div>经验</div>
        </div>
      </li>
          <li>
        <div class="meta-block">
          <p>{$user['credit2']}</p>
          <div>财富</div>
        </div>
      </li>
    </ul>
  </div>
   <div class="invateaddress">
  <p>复制邀请注册地址分享给好友:<span>{url user/register/$user['invatecode']}</span></p>
  {if $this->setting ['credit1_invate']!=null}<p>邀请注册可获得经验值：{$setting['credit1_invate']}点，财富值：{$setting['credit2_invate']}点{/if}
  </div>
</div>
<script>
$(".avatar").hover(function(){
	$(".avatar .usereditavatar").show();
},function(){
	$(".avatar .usereditavatar").hide();
}
)
</script>
