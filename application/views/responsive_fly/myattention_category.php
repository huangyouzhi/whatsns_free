

<!--{template header}-->

<div class="layui-container fly-marginTop fly-user-main">
{template user_menu}

  
  <div class="fly-panel fly-panel-user" pad20>
    <div class="layui-tab layui-tab-brief" lay-filter="user">
     {template myattention_nav}
      <div class="layui-tab-content" style="padding: 20px 0;">
        <div class="layui-tab-item layui-show">
    
    <div class="layui-row layui-col-space-2 hotcategorylist">
   
       <!--{loop $categorylist  $category1}-->
    <div class="layui-col-md6">
 <div class="layui-card hotcategory">
  <div class="layui-card-header"><a href="{eval echo getcaturl($category1['id'],'category/view/#id#');}"> <img src="{$category1['bigimage']}" class="catbigimage" title="{$category1['name']}" alt="{$category1['name']}">{$category1['name']}</a></div>
  <div class="layui-card-body">
  <p class="layui-text	">
  {if $category1['miaosu']}
{eval echo clearhtml($category1['miaosu']);}
   {else}
该话题暂无描述
{/if}
</p>
  </div>
  <div class="layui-card-footer">
  <p><span>{$category1['questions']}个问题</span><span>{$category1['followers']}个关注</span></p>
  </div>
</div>
    </div>
  <!--{/loop}-->
  </div>
         
          {template page}
        </div>
    
      </div>
    </div>
  </div>
</div>
<!--{template footer}-->





<!--{template header}-->


<div class="container person">
  <div class="row">
    <div class="col-xs-17 main">
          <!-- 用户title部分导航 -->
              <!--{template user_title}-->
                 <ul class="trigger-menu" data-pjax-container="#list-container">

      <li class=""><a href="{url user/attention/article}"><i class="fa fa-rss"></i> 关注的文章</a></li>
<li class=""><a href="{url user/attention/question}"><i class="fa fa-question"></i> 关注的问题</a></li>
<li class=""><a href="{url user/attention}"><i class="fa fa-user"></i> 关注的用户</a></li>
<li class="active"><a href="{url user/attention/topic}"><i class="fa fa-tag"></i> 关注的话题</a></li>
 </ul>
      <div id="list-container">
        <!-- 关注话题列表模块 -->
            <!--{if $categorylist==null}-->
                去关注你喜欢的话题把-><a class="btn btn-success" href="{url category/viewtopic/hot}">关注话题</a>
                 <!--{/if}-->
<ul class="note-list" >
      <!--{loop $categorylist $index $cat}-->

    <li id="note-{$cat['id']}" data-note-id="{$cat['id']}" >

        <div class="content">
            <div class="author">





        <a class="avatar" target="_blank" href="{url user/space/$cat['uid']}">
                    <img src="{$cat['avatar']}" alt="96">
                </a>      <div class="name">
                <a class="blue-link" target="_blank" href="{url user/space/$cat['uid']}">我关注了话题</a>



                <span class="time" data-shared-at="{$cat['doing_time']}">{$cat['doing_time']}</span>
            </div>
            </div>



            <div class="follow-detail">
      <div class="info">
        <a class="avatar-collection" href="{eval echo getcaturl($cat['id'],'category/view/#id#');}">
          <img src="{$cat['bigimage']}" alt="180">
</a>
{if $cat['follow']}
 <a class="btn btn-default following" id="attenttouser_{$cat['id']}" onclick="attentto_cat($cat['id'])"><i class="fa fa-check"></i><span>已关注</span></a>

{else}
 <a class="btn btn-success follow" id="attenttouser_{$cat['id']}" onclick="attentto_cat($cat['id'])"><i class="fa fa-plus"></i><span>关注</span></a>

{/if}
        <a class="title" href="{$cat['url']}">{$cat['name']}</a>
        <p>

          {$cat['questions']} 个问题， {$cat['followers']} 人关注
        </p>
      </div>
        <div class="signature">
        {$cat['miaosu']}
        </div>
    </div>





        </div>
    </li>

    <!--{/loop}-->












</ul>
  <div class="pages" >{$departstr}</div>
      </div>
    </div>

<div class="col-xs-7  aside">
   <!--{template user_menu}-->
</div>

  </div>
</div>
<!--{template footer}-->