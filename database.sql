/**
* Assignment 2.
* 
* Provides the instructions to make a database and a table 
* 
* @author Joshua Loo
* @date 2016-03-14
* @version 1
*/

//on Mac
cd /Applications/MAMP/bin/apache2/bin
./mysql -u root -p root

//on Windows...
cd C:\Program Files\xampp\bin
mysql -h localhost-u root -p

create database assign2;

create table users(
	id int(10) primary key auto_increment,
	password varchar(50),
	firstname varchar(50),
	lastname varchar(50),
	email varchar(50),
	profile_picture varchar(50)
	);


//syntax examples 

insert into students values(null, 'Gary', 'Tong', 'gary_tong@bcit.ca');
insert into students values(null, 'Jorge', 'Gonzalez', 'jorge@bcit.ca');
insert into students values(null, 'Peter', 'Guo', 'peter@bcit.ca');

select * from students;
select * from students where id = '2';
select * from students where firstname like "ga%";
select firstname, email from students where id = '2';

update students set firstname = "Jorge";
update students set firstname = "Gary" where id = 1;

delete from students;
delete from students where id = 6;
