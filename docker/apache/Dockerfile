# docker/apache/Dockerfile
FROM httpd:2.4.51

COPY webcrawl.apache.conf /usr/local/apache2/conf/webcrawl.apache.conf

RUN echo "Include /usr/local/apache2/conf/webcrawl.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf