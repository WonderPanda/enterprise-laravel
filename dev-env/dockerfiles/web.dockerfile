FROM nginx:1.17

ADD dev-env/config/nginx/vhost.conf /etc/nginx/conf.d/default.conf
