FROM swr.cn-north-1.myhuaweicloud.com/xxh/php:7.1.12-fpm-jessie-prod

# 拷贝解压缩包
COPY build/tools/unzip_6.0-16+deb8u3_amd64.deb /home/unzip.deb
COPY build/tools/zip_3.0-8_amd64.deb /home/zip.deb

# 安装解压缩包
RUN dpkg -i /home/unzip.deb \
    && dpkg -i /home/zip.deb \
    && rm /home/unzip.deb \
    && rm /home/zip.deb

ENV APP_ENV=production

# 安装composer
ADD build/tools/composer.phar /usr/local/bin/composer
RUN chmod 755 /usr/local/bin/composer
RUN composer config -g repo.packagist composer https://wfhtmc:H2_u6_kU0@repo.huaweicloud.com/repository/php/

# 全局安装部署命令
RUN composer global require laravel/envoy

# 拷贝程序源码
ADD src.tar /var/www/html/

WORKDIR /var/www/html

# 删除不必要的文件
RUN cd /var/www/html \
    && rm Dockerfile \
    && rm -R build \
    && rm package.json \
    && rm phpunit.xml \
    && rm webpack.mix.js

# 执行部署脚本
RUN  ~/.composer/vendor/bin/envoy run deploy

# 赋权限
RUN cd /var/www/html \
    && chown -R www-data:www-data * \
    && chmod -R 777 storage


ENTRYPOINT  ["/bin/bash","-c","~/.composer/vendor/bin/envoy run start && docker-php-entrypoint php-fpm"]
