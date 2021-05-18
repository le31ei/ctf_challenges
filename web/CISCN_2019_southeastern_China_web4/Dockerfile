FROM python:2.7-alpine

LABEL Author="glzjin <i@zhaoj.in>" Blog="https://www.zhaoj.in"

ENV FLASK_APP=app.py FLASK_ENV=production

COPY app /app

RUN adduser -h /app glzjin -D && \
	sed -i 's/dl-cdn.alpinelinux.org/mirror.tuna.tsinghua.edu.cn/g' /etc/apk/repositories && \
	apk update && \
	apk add --no-cache gcc libc-dev libffi-dev libxml2-dev python-dev libxml2-dev g++ libxslt-dev && \
	pip install \
	-i http://mirrors.aliyun.com/pypi/simple/ \
	--trusted-host mirrors.aliyun.com \
	-r /app/requirements.txt && \
	mv /app/docker-entrypoint /usr/local/bin/docker-entrypoint && \
	chmod +x /usr/local/bin/docker-entrypoint && \
	mv /app/flag.sh /

EXPOSE 5000

WORKDIR /app

ENTRYPOINT ["/usr/local/bin/docker-entrypoint"]
