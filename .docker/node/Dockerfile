FROM node:14-alpine as node

WORKDIR /var/www
COPY .docker .

RUN npm install --global cross-env
# RUN npm install --global yarn
RUN yarn install

VOLUME /var/www/node_modules
