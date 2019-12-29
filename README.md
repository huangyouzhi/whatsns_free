# whatsns内容付费seo优化带采集和熊掌号运营问答系统
#### 宝塔面板安装等用户特别注意
如果是php7+版本安装，请留意是否开启了opencache是否开启，安装过程最好先关闭此缓存组件，因为需要读写config.php和database.php配置文件，开启后会导致因为缓存问题不能读取到最新的php文件，从而超级管理员创建失败不能登录（登录会提示账号密码错误）
#### 项目介绍
whatsns问答系统是一款可以根据自身业务需求快速搭建垂直化领域的php开源问答系统，内置强大的采集功能，支持云存储，图片水印设置，全文检索，站内行为监控，短信注册和通知，伪静态URL自定义，熊掌号功能，百度结构化地图（标签，问题，文章，分类，用户空间），PC和Wap模板分离，内置多套pc和wap模板，站长自由切换，同时后台支持模板管理在线编辑修改模板，强大的防灌水拦截和过滤配置等上百项功能，深入SEO优化，适合对SEO有需求的站长。商业版还支持火车采集，高级微信公众号接口功能，支持支付宝支付、微信扫码支付、微信JSSDK支付、微信H5支付、小程序支付、适合不同场景支付业务需求，如充值，打赏，回答偷看，付费专家咨询。 

#### 特别提示
V4免费版用户已安装的，如果需要更新，请移动V4更新地址
https://gitee.com/huangyouzhi/whatsnsV4_free_update

#### 软件架构
基于php的CodeIgniter3.1.6开发
优雅的CI框架是国内php开发者最喜欢的MVC框架，上手快，轻量级，可以在虚拟主机单核cpu1g内存1m带宽下完美流畅运行，可以参考CI官网了解更多框架信息http://codeigniter.org.cn/


#### 安装教程



>  **直接上传程序到问答根目录即可，安装方法，上传程序后直接输入http://你的域名/install** 
> 
>  **如果是二级目录安装：安装在某个域名网站下的用户，请将安装地址定位到你的问答，输入http://你的域名/二级目录/install** 

#### 4.0更新功能说明




- 新增删除用户，同时删除用户头像
- 个人设置中心新增微信绑定和解绑
- 修改用户中心个人设置模板
- 标签管理里新增熊掌号标签推送
- 内容管理标签列表新增标签名称和别名搜索
- 邮件营销--新增每周推荐（文章，问答，用户）和新功能上线推荐
- 用户中心通知设置项新增私信和邮箱设置
- 个人中心我的文章里新增我收藏文章取消收藏功能
- 升级了朋友圈分享接口，旧版接口会被取消
- 修改系统管理员发布文章和编辑文章不需要审核
- 修复文章内容关键词应用没生成问题
- 后台全局设置里新增水印图片开启和关闭
- pc端开放平台微信登录已修改，防止和微信端登录不兼容
- 修复ueditor编辑器上传视频后编辑带视频内容导致无法加载视频的问题
- 新增提现记录和后台手动设置用户金额记录
- 后台文章管理里新增文章编辑并可设置阅读数，文章审核页面新增编辑操作
- 后台插件管理里新增发布文章插件
- 后台认证管理新增已认证用户列表显示
- 文章新增熊掌号搜索结果出图功能
- 修复默认悬赏采纳平台不分成问题
- 后台用户组编辑页面新增标签管理，推荐和顶置管理，马甲发布文章，熊掌号配置权限操作设置
- 后台系统设置--全局设置可开启或者关闭是否必须邀请注册
- 后台全局设置--可以一键开启网站需登录才能访问设置
- 后台用户管理--用户组编辑可以设置不同角色是否能免费查看需付费支付的答案
- 新增独立问题回答详情页面（独立的回答详情url,优化seo）
- 新增前端访问问题/回答/文章自动将问题/回答/文章的url推送到熊掌号（后台需配置熊掌号方可自动推送）




#### 使用说明
数据表字典下载：https://pan.baidu.com/s/1mltRTGcWtj5IdfHTrOEpZw
开发文档： https://pan.baidu.com/s/1-o-SqwlHdlKo-QDMe0wEMA
邮箱配置教程:https://www.ask2.cn/article-14579.html

水印设置教程:https://www.ask2.cn/article-14580.html

伪静态教程:https://www.ask2.cn/article-14574.html

#### 界面截图
![输入图片说明](https://images.gitee.com/uploads/images/2019/0221/091048_db88867f_482269.png "屏幕截图.png")
![输入图片说明](https://images.gitee.com/uploads/images/2019/0221/091146_cac7eef3_482269.png "屏幕截图.png")
![输入图片说明](https://images.gitee.com/uploads/images/2019/0221/091113_aa49ca9b_482269.png "屏幕截图.png")

![输入图片说明](https://images.gitee.com/uploads/images/2019/0221/091217_793ee73e_482269.png "屏幕截图.png")

![输入图片说明](https://images.gitee.com/uploads/images/2019/0221/091237_4b468add_482269.png "屏幕截图.png")

![输入图片说明](https://images.gitee.com/uploads/images/2019/0221/091302_8f85a65f_482269.png "屏幕截图.png")

![输入图片说明](https://images.gitee.com/uploads/images/2019/0221/091318_18ee656d_482269.png "屏幕截图.png")

#### 参与贡献

1. Fork 本项目
2. 新建 Feat_xxx 分支
3. 提交代码
4. 新建 Pull Request


#### 码云特技

1. 使用 Readme\_XXX.md 来支持不同的语言，例如 Readme\_en.md, Readme\_zh.md
2. 码云官方博客 [blog.gitee.com](https://blog.gitee.com)
3. 你可以 [https://gitee.com/explore](https://gitee.com/explore) 这个地址来了解码云上的优秀开源项目
4. [GVP](https://gitee.com/gvp) 全称是码云最有价值开源项目，是码云综合评定出的优秀开源项目
5. 码云官方提供的使用手册 [https://gitee.com/help](https://gitee.com/help)
6. 码云封面人物是一档用来展示码云会员风采的栏目 [https://gitee.com/gitee-stars/](https://gitee.com/gitee-stars/)