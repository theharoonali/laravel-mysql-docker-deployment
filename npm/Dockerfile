FROM node:12.14
WORKDIR /var/www/html/src
ENV PATH /var/www/html/src/node_modules/.bin:$PATH
RUN npm install
COPY . ./
EXPOSE 3000
CMD ["npm", "start"]


