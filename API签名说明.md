# API签名说明

## API_KEY 申请
暂未开放。

## 签名流程

首先。温柔地将你的`API_KEY`和`API_SECRET_KEY`拼接为一个字符串。

然后，按照你的参数顺序，将你的每一个参数(字典序)的内容转换为字符串，拼接在上述字符串的末尾。

例如，假设你的请求地址为`https://shiny.kotori.moe/Data/add?param1=param1c&param2=param2c`，那么你需要准备的字符串应该为`API_KEY + API_SECRET_KEY + param1c + param2c`，其中` + `表示字符串的连接。

然后，将你准备的字符串做一次`SHA1`摘要运算。

在提交请求时，你需要带上`api_key`和`sign`两个参数。
