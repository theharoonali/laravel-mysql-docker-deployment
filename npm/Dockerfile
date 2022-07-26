FROM node:12.14
WORKDIR /var/www/html/src
ENV PATH /var/www/html/src/node_modules/.bin:$PATH
COPY composer.json /npm
COPY composer.lock /npm
COPY package.json /npm
RUN npm install
COPY . ./
EXPOSE 3000
CMD ["npm", "start"]


