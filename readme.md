# Mirai

## 项目简介

这是一个自用项目。暂不说明。

## 部署说明

本项目由三部分组成。

采集部分 - [Mirai](https://github.com/Shiny-Project/Mirai) (Python)

中央控制 - [Mika](https://github.com/Shiny-Project/Mika) (Node.js)

Web服务 - [Shiny](https://github.com/Shiny-Project/Shiny) (Node.js)


### 首先需要安装
1. Node.js 6.0+
2. Python 3.5+
3. MariaDB 10.1 / MySQL

以Ubuntu 14.04 LTS为例详细说明如下：

#### 安装运行环境
1. 安装Node.js

```bash
wget -qO- https://raw.githubusercontent.com/creationix/nvm/v0.31.4/install.sh | bash # 安装nvm
nvm install 6.4.0
```

2. Python3.5+

系统自带的Python是3.4版本，需要再安装3.5+版本。

此处使用Pyenv

```bash
curl -L https://raw.githubusercontent.com/yyuu/pyenv-installer/master/bin/pyenv-installer | bash
apt-get install -y make build-essential libssl-dev zlib1g-dev libbz2-dev libreadline-dev libsqlite3-dev wget curl llvm libncurses5-dev libncursesw5-dev xz-utils
pyenv install 3.5.2 # 可能需要重启生效
```

3. 安装MariaDB
```bash
sudo apt-get install mariadb-server
```

#### 下载程序安装依赖

1. 安装Mirai

```bash
git clone https://github.com/Shiny-Project/Mirai-spider
cd Mirai-spider
python3 -m pip install -r requirements.txt
```

2. 安装Mika

```bash
git clone https://github.com/Shiny-Project/Mika
cd Mika
npm install
```

3. 安装Shiny

```bash
npm install -g sails
git clone https://github.com/Shiny-Project/Shiny
cd Shiny
npm install
```

#### 配置

1. 修改`./Shiny/config/env/development.js`中的数据库相关设置。
2. 修改`./Mika/Main.js`中的监听端口设置。
3. 修改`./Mirai-spider/core/config.py`中的数据和端口设定。
4. 修改`.Shiny/assets/Main.js` 10行附近的socket连接参数。

#### 启动

建议先启动Mika。

```bash
cd Mika
node Main.js
```

再启动Mirai

```bash
cd Mirai
python3 Main.py ignite
```

再启动Shiny
```bash
cd Shiny
sails lift
```