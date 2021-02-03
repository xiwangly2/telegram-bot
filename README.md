# telegram-bot
xiwangly的telegram机器人程序:telegram-bot

[@BotFather]:https://t.me/BotFather

对于中国用户：搭建此脚本需要能访问国外网络的服务器或虚拟主机

建议：下载后请把文件夹重命名为`telegram-bot`或其他，不建议保留分支名称。php版本建议>=7.2

如有安全需求，请把`config.php`放置在Web文档树之外，并且修改各脚本的相关文件引入

>请联系telegram中的[@BotFather]机器人注册自己的机器人，机器人的多数设置都在这里进行<br/>
>请勿泄露`$token`，如果已泄露，请联系[@BotFather]机器人更改`$token`<br/>

>`config.php`中的`$hookurl`需要修改为自己的项目地址（网站必须使用https）<br/>
数据库信息是可选的，用于部分功能，填入后请导入`dic.sql`数据库<br/>
`$debug`可能的值为`0`或`1`，用于开启日志记录和调试，默认关闭，填`1`开启

config设置详解：（前面已提到过的略）

```
$token = '';//
$connectroot = "https://api.telegram.org/bot{$token}/";//连接根信息
$hookurl = 'https://您的域名/telegram-bot/index.php';//telegram-bot项目的主文件URL地址
$botname = '@机器人用户名';//
$administrator = '主人用户名';//用于机器功能管理
$getdatamax = '2083';//设置允许容纳GET方式发送的数据包最大大小（单位B），设置为0则始终采用POST方法发送数据
$host = 'host(:port)';//数据库的host地址和端口，若端口默认为3306则可省略输入port
$sqlusername = '数据库用户名';//
$password = '数据库密码';//
$dbname = '数据库名';//
$tablename = '数据库表名';//
$debug = '0';//填1开启调试和消息记录，仅用于开发测试环境
```

**`config.php`为必填项，完成后请访问`webhook.php`完成网络挂钩**

参考：
* [Bots: An introduction for developers](https://core.telegram.org/bots)
* [Telegram Bot API](https://core.telegram.org/bots/api)
