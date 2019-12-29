<!--{template meta}-->
<section class="ui-container">
    <style>
        body{
            background: #f1f5f8;
        }
    </style>
    <div class="ws_header">
        <i class="fa fa-home" onclick="window.location.href='{url index}'"></i>
        <div class="ws_h_title">{$setting['site_name']}</div>
        <i class="fa fa-search"  onclick="window.location.href='{url question/searchkey}'"></i>
    </div>
     <!--话题介绍-->
                    <div class="au_category_huati_info">
                           <div class="ui-row-flex">
                               <div class="ui-col">
                                   <div class="au_category_huati_img">
                                    <a href="{url category/view/$category['id']}">
                                       <img src="{$category['bigimage']}">
                                       </a>
                                   </div>
                               </div>
                               <div class="ui-col ui-col-3">
                                   <div class="au_category_huati_name"> <a  href="{url category/view/$category['id']}"> {$category['name']}</a></div>
                                   <div class="au_category_info_meta">
                                       <div class="au_category_info_meta_item"><i class="fa fa-question-circle hong"></i>{$category['questions']}个问题</div>
                                       <div class="au_category_info_meta_item"><i class="fa fa-user lan"></i>{$category['followers']}人关注</div>
                                       <div class="au_category_info_meta_item"><i class="fa fa-file-text-o ju "></i>{$trownum}篇文章</div>
                                   </div>
                               </div>
                         
                           </div>
                       {if $sublist}
                        <!--子话题-->
                        <div class="ui-row-flex">
                            <div class="ui-col ui-col au_category_info_childlist">

                                <div class="swiper-container" >
                                    <div class="swiper-wrapper">
                                      <!--{loop $sublist $index $cat}-->
                                        <div class="swiper-slide" data-swiper-autoplay="2000">
                                         
                                               
                                                    <div class="au_category_info_child">
                                                        <a href="{url category/view/$cat['id']}">
                                                        <div class="au_category_info_child_img">
                                                            <img src="$cat['image']">
                                                        </div>
                                                        <p class="au_category_info_child_text">{$cat['name']}</p>
                                                        </a>
                                                    </div>
                                               

                                            
                                        </div>
                                  <!--{/loop}--> 
                                    </div>

                                </div>
                                <!-- 如果需要导航按钮 -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>



                            </div>

                        </div>
                        {/if}

                    </div>
                              <!--导航提示-->
                    <div class="ws_cat_au_brif">
                     <span class="ws_cat_au_bref_item  <!--{if all==$status}-->current<!--{/if}-->"><a href="{url category/view/$cid/all}">全部问题</a> </span>
                       
                        <span class="ws_cat_au_bref_item <!--{if 1==$status}-->current<!--{/if}-->"><a href="{url category/view/$cid/1}">
      未解决</a></span>
                        <span class="ws_cat_au_bref_item <!--{if 2==$status}-->current<!--{/if}-->"><a  href="{url category/view/$cid/2}"> 已解决</a></span>
                        <span class="ws_cat_au_bref_item <!--{if 6==$status}-->current<!--{/if}-->"> <a href="{url category/view/$cid/6}"> 推荐问题</a></span>
                       {if $category['isusearticle']}  <span class="ws_cat_au_bref_item"><a href="{url topic/catlist/$cid}"> 相关文章</a></span> {/if}
                    </div>
                     <!--列表部分-->
           
                
                    <div class="qlists">

 
  
      <div class="stream-list question-stream xm-tag tag-nosolve">
         <!--{loop $questionlist $index $question}-->
      <section class="stream-list__item">
       {if $question['status']==2}
                <div class="qa-rank"><div class="answers answered solved ml10 mr10">
                {$question['answers']}<small>解决</small></div></div>     
                {else}
                {if $question['answers']>0}
                <div class="qa-rank"><div class="answers answered ml10 mr10">
                $question['answers']<small>回答</small></div>
                </div>
                   {else}
                   <div class="qa-rank"><div class="answers ml10 mr10">
                0<small>回答</small></div></div>
                {/if}
                
                
                {/if}
                   <div class="summary">
            <ul class="author list-inline">
                                           
                                                <li class="authorinfo">
                                          {if $question['hidden']==1}
                                            匿名用户
                      
                       {else} 
                          <a href="{url user/space/$question['authorid']}">
                          {$question['author']}{if $question['author_has_vertify']!=false}<i class="fa fa-vimeo {if $question['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  " ></i>{/if}
                          </a>
                      
                         {/if} 
                       
                        <span class="split"></span>
                        <a href="{url question/view/$question['id']}">{$question['format_time']}</a>
                                    </li>
            </ul>
            <h2 class="title"><a href="{url question/view/$question['id']}">{$question['title']}</a></h2>
 <!--{if $question['tags']}-->
           <ul class="taglist--inline ib">
<!--{loop $question['tags'] $tag}-->
<li class="tagPopup authorinfo">
                        <a class="tag" href="{url tags/view/$tag['tagalias']}" >
                                                       {$tag['tagname']}
                        </a>
                    </li>
                    

                           
                <!--{/loop}-->
                 </ul>
                <!--{else}--><!--{/if}-->
                
              
                                   
                           
                                            </div>
    </section>
  
  
    <!--{/loop}-->
      
      </div>
   
   

</div>
               <div class="pages">{$departstr}</div>
                    

<script>
    var swiper = new Swiper('.swiper-container', {
        loop:true,
        autoplay:2000,
        slidesPerView: 3,
        paginationClickable: true,
        spaceBetween: 10,
        // 如果需要前进后退按钮
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });
    var intswper=setInterval("swiper.slideNext()", 2000);
    $(".swiper-container").hover(function(){
        clearInterval(intswper);
    },function(){
        intswper=setInterval("swiper.slideNext()", 2000);
    })
</script>
</section>
<!--{template footer}-->