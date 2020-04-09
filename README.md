# Happiness
## 项目简介
这次的项目由我和潘同学共同开发，由两部分构成，包括聊天室和留言板。我负责基于php的laravel框架的留言板开发。

学长给的题目很宽泛——“幸福感”，而我们选取的是获得幸福感这个角度。每个人对幸福感的定义或许都不尽相同，有些人很贪心，也有很多人不敢奢求太多。但我们相信的是，幸福感是可以相互传递的，而这就是我们制作这个小网页的主题。  

在网站主页的聊天室中，你可以根据自己的目前的状态进入不同的聊天室，选择不同的头像，与陌生的、情感状态类似的人们闲聊，或许在交流中，你能释怀一些小小的烦恼，又或是收获一些简单的快乐。当你真真切切地感受到幸福感后，你可以选择进入我们的留言板将你的一些小确幸或是感悟分享给那些依旧在寻找属于自己的幸福感的那些陌生的朋友们。幸福感也许就可以像这样一直传递下去。  

## 留言板功能介绍
由于潘同学使用的是和我不同的框架，所以我们将分别讲述各自板块实现的功能和环境的配置，以及最后的整合。  

* 用户可以浏览留言并签写留言，这次并没有做登陆注册功能，只是不希望一个在传递幸福感的网站会有太多繁琐而无用的细节.   ~~（毕竟如果投入使用之后对大多数人来说这个网站应该都是一次性用品吧233333~~
* 用户可以点赞，浏览留言的界面会自动按获得赞数量的多少对留言进行排序（但是没有取消点赞功能23333）
* 用户可以点击回复图标进入回复界面，这里将展示所有对此条留言的回复。用户可以对任意一条留言或者回复进行回复（类似于QQ空间的说说下方的评论）
* 每条留言都要经过管理员审核才会在页面上显示，管理员需要登录，并且管理员可以删除任意一条留言或者回复。管理员还可以进行隐藏留言和置顶的操作。  

## 环境配置-phpstudy及laravel的安装
首先需要去phpstudy的官网下载phpstudy集成开发环境，确保路径中无中文，并确认设置中的网站目录放置在www路径下。  

然后去composer的官网下载composer，选择command-line时选择一个php.exe文件，然后安装。在命令行输入 composer global require "laravel/installer" 如果速度太慢的话,可以更换成国内的源。（以下内容大部分来自于曹老板的github）然后打开phpstudy，启动mysql和nginx，创建一个站点。
* 域名随意
* 第二域名可以留空
* 端口号不要选择80端口，因为潘同学的聊天室默认创建在80端口上
* 根目录设置到laravel项目根目录的public目录下
* php版本需要大于7.2
* 其他配置全部默认  

然后点击右侧的管理，伪静态输入，将原先的代码全部删除，输入
```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```
然后继续点开管理，勾上几个扩展
* php curl
* php_fileinfo
* php_gd2
* php_mbstring
* php_openssl
* php_pdo_mysql

如果是clone过来的库的话，可能是没有.env文件的，这个是laravel的环境配置，但是一般都会有一个.env.example，我们需要做的是在根目录执行
```
cp .env.example .env
```
然后编辑创建出的.env文件，大致需要改的部分就是数据库。
```
...

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
...
```
然后到项目根目录下面
```
composer install
```
完了之后在根目录执行
```
php artisan key:generate
```
数据库再phpstudy的左侧数据库中创建，并需要在laravel项目的.env文件中修改信息，我填写的默认数据库名称为happiness 用户名为UMR 密码为123456   

然后由于我的疏忽，再一次没有写迁移文件，导致github上并没有我的表的结构，老板们对不起(x  下面附上表的结构 害

```
create table `message` (
`id` int(12) NOT NULL AUTO_INCREMENT,
`nickname` varchar(32) NOT NULL ,
`content` text NOT NULL,
`settop` tinyint(1) NOT NULL DEFAULT 0,
`ifshow` tinyint(1) NOT NULL DEFAULT 0,
`ifqqh` tinyint(1) NOT NULL DEFAULT 0,
`systime` datetime DEFAULT NULL,
`like` int(12) DEFAULT 0,
primary key(`id`)
)engine=InnoDB DEFAULT CHARSET=utf8;
```
```
create table `reply`(
`id` int(12) NOT NULL AUTO_INCREMENT,
`content` text NOT NULL,
`replytime` datetime DEFAULT NULL,
`nickname` varchar(32) DEFAULT NULL ,
`mastername` varchar(32) DEFAULT NULL ,
`mid` int(12) DEFAULT NULL,
primary key(`id`)
)engine=InnoDB DEFAULT CHARSET=utf8;
```
最后为了实现两个板块的链接，需要在聊天室项目文件中的index.html中第30行
```
<a class="waves-effect waves-light btn" href="http://127.0.0.1:8000"><i class="material-icons right">share</i>I want to share</a>
```
将href后的url改为http://127.0.0.1:加创建的站点的端口号。

ok，感觉应该差不多了(雾
