FROM  mysql:5.7

#RUN "sudo mysql_tzinfo_to_sql /usr/share/zoneinfo | mysql -u root mysql"

COPY schema.sql /docker-entrypoint-initdb.d/

EXPOSE 3306

VOLUME [ "/backup/" ]

