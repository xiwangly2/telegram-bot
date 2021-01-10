# telegram-bot
xiwangly的telegram机器人程序:telegram-bot

[@BotFather]:https://t.me/BotFather

对于中国用户：搭建此脚本需要能访问国外网络的服务器或虚拟主机

建议：下载后请把文件夹重命名为`telegram-bot`或其他，不建议保留分支名称。

如有安全需求，请把`config.php`放置在Web文档树之外，并且修改各脚本的相关文件引入

>请联系telegram中的[@BotFather]机器人注册自己的机器人，机器人的多数设置都在这里进行<br/>
>请勿泄露`$token`，如果已泄露，请联系[@BotFather]机器人更改`$token`<br/>

>`config.php`中的`$hookurl`需要修改为自己的项目地址（网站必须使用https）<br/>
数据库信息是可选的，用于部分功能，填入后请导入`dic.sql`数据库<br/>
`$debug`可能的值为`0`或`1`，用于开启日志记录和调试，默认关闭，填`1`开启

**`config.php`为必填项，完成后请访问`webhook.php`完成网络挂钩**

参考：
* [Bots: An introduction for developers](https://core.telegram.org/bots)
* [Telegram Bot API](https://core.telegram.org/bots/api)
