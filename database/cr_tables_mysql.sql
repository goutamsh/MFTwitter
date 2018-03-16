create database mftwitter;

use mftwitter;

CREATE TABLE ROLES
(ROLES_ID INT NOT NULL,
ROLES_DESC VARCHAR(15),
PRIMARY KEY (ROLES_ID));

CREATE TABLE USERS
(USER_ID INT NOT NULL auto_increment,
FIRST_NAME VARCHAR(15),
LAST_NAME VARCHAR(15),
ROLES_ID INT,
LOGIN VARCHAR(15) NOT NULL,
PASSWORD VARCHAR(15) NOT NULL,
PRIMARY KEY (USER_ID),
CONSTRAINT FK_ROLES_USERS FOREIGN KEY (ROLES_ID) REFERENCES ROLES(ROLES_ID));


CREATE TABLE CHAT_MSG
(CHAT_MSG_ID INTEGER NOT NULL auto_increment,
USER_ID INTEGER,
MSG VARCHAR(125),
DATE1 DATE,
PRIMARY KEY (CHAT_MSG_ID),
CONSTRAINT FK_USER_ID FOREIGN KEY (USER_ID) REFERENCES USERS(USER_ID));



insert into roles(ROLES_ID,ROLES_DESC) values (1, 'ADMINISTRATOR');
insert into roles(ROLES_ID,ROLES_DESC) values (2, 'USER');

insert into users(FIRST_NAME,LAST_NAME,ROLES_ID,LOGIN,PASSWORD) values ('SSO', NULL,1,'sso','admin');
insert into users(FIRST_NAME,LAST_NAME,ROLES_ID,LOGIN,PASSWORD) values ('Goutam', 'SH',1,'aa','aa');
insert into users(FIRST_NAME,LAST_NAME,ROLES_ID,LOGIN,PASSWORD) values ('Ram', NULL,1,'bb','bb');
insert into users(FIRST_NAME,LAST_NAME,ROLES_ID,LOGIN,PASSWORD) values ('Sam', NULL,1,'cc','cc');

insert into users(FIRST_NAME,LAST_NAME,ROLES_ID,LOGIN,PASSWORD) values ('Chetan', 'BJ',1,'chets','Chets12');
insert into users(FIRST_NAME,LAST_NAME,ROLES_ID,LOGIN,PASSWORD) values ('Ananth', 'S',1,'ananth','ananth12');
insert into users(FIRST_NAME,LAST_NAME,ROLES_ID,LOGIN,PASSWORD) values ('Kiran', 'PMK',1,'kiran','Kiran12');
insert into users(FIRST_NAME,LAST_NAME,ROLES_ID,LOGIN,PASSWORD) values ('Goutam', 'SH',1,'goutam','goutam12');
insert into users(FIRST_NAME,LAST_NAME,ROLES_ID,LOGIN,PASSWORD) values ('Deepashree', 'KM',1,'deeps','deeps12');
insert into users(FIRST_NAME,LAST_NAME,ROLES_ID,LOGIN,PASSWORD) values ('Sindhu', 'B',1,'sindhu','sindhu12');


alter table chat_msg modify msg varchar(1024);


commit;