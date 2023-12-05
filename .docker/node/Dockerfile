FROM node:21 as node

WORKDIR /var/www/html
COPY . .

RUN npm install --global cross-env
RUN npm install

VOLUME /var/www/html/node_modules

ENTRYPOINT [ ".docker/node/entrypoint.sh" ]
