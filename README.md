# 自助建站安装说明（laravel）


> * 下面是简单说明，后期会详细完善该文档
> * 该项目不牵扯过多业务，只用来介绍快速接入信息化平台（https://xinxihua.com）


## 环境
1. 可以查看 laravel 5.5 所需环境
2. 推荐homestead 作为本地开发环境


## Install

1. 下载源码，然后 copy .env.production >> .env

创建数据库，然后配置数据库链接

以下配置信息 请联系我们获取 QQ： 759242210
```

# 正式环境需要配置
REST_CLIENT_ID=
REST_CLIENT_SECRET=

# 配置授权
AUTH_TOKEN=
AUTH_ENCODING_KEY=
```

2. 在项目根目录下执行


安装 php 依赖以及创建数据库测试信息
```
composer install

php artisan key:generate

php artisan passport:keys

php artisan migrate --seed
```

编译前台文件

```
npm install

npm run dev
```

3. 模拟登陆

通过中间件 EnvCheck ,当检测为本地环境时，自动登陆。




## 注意问题

1. **平台是 SAAS 模式，各租户之间共用数据库，可使用 corp_id 字段进行租户数据隔离**
2. 平台API 地址  [http://doc.xinxihua.com](http://doc.xinxihua.com)，注意互联互通
3. ...







