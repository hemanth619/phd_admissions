create database if not exists test;

CREATE TABLE users (
`id` INT NOT NULL auto_increment ,
`name` VARCHAR( 25 ) NOT NULL UNIQUE,
`password` VARCHAR( 50 ) NOT NULL ,
`email` VARCHAR( 50 ) NOT NULL UNIQUE,
PRIMARY KEY ( `id` )
);


CREATE TABLE IF NOT EXISTS `admin` (
  `password` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
)

create table personal_info(
user_name varchar(20) not null unique, 
App_no varchar(10) not null, 
Full_Name varchar(50) not null, 
gender varchar(6) not null, 
Birth_date int not null, 
Birth_month int not null, 
Birth_year int not null, 
fname varchar(50) not null, 
Nationality varchar(20) not null, 
Marital_status varchar(50) not null,
Physically_challenged varchar(50) not null, 
community varchar(50) not null, 
Minority varchar(50) not null, 
pemail varchar(50) not null, 
aemail varchar(50) not null, 
Temp_Address varchar(250) not null, 
T_District varchar(50) not null, 
T_state varchar(50) not null, 
T_pincode int not null, 
T_phone_number varchar(50) not null, 
T_mobile_number varchar(50) not null, 
perm_Address varchar(250) not null, 
P_District varchar(50) not null, 
P_state varchar(50) not null, 
P_pincode int not null, 
P_phone_number varchar(50) not null, 
P_mobile_number varchar(50) not null

);

create table qualifications (
        user_key varchar(20) not null unique,
	10_univ varchar(100) not null,
        10_degree varchar(100) not null,
        10_marks float not null,
        10_grade varchar(50) not null,
        10_year int not null,
        12_univ varchar(100) not null,
        12_degree varchar(100) not null,
        12_marks float not null,
        12_grade varchar(50) not null,
        12_year int not null,
        bd_univ varchar(100) not null,
        bd_degree varchar(100) not null,
        bd_marks float not null,
        bd_grade varchar(50) not null,
        bd_year int not null,
        pg_univ varchar(100) not null,
        pg_degree varchar(100) not null,
        pg_marks float not null,
        pg_grade varchar(50) not null,
        pg_year int not null,
        o_univ varchar(100) not null,
        o_degree varchar(100) not null,
        o_marks float not null,
        o_grade varchar(50) not null,
        o_year int not null,
        bd_1 float not null,
        bd_2 float not null,
        bd_3 float not null,
        bd_4 float not null,
        bd_5 float not null,
        bd_6 float not null,
        bd_7 float not null,
        bd_8 float not null,
        bd_9 float,
        bd_10 float,
        bd_agr float not null,
        bd_class varchar(10) not null,
        md_1 float not null,
        md_2 float not null,
        md_3 float not null,
        md_4 float not null,
        md_agr float not null,
        md_class varchar(10) not null
        
        );

create table experience(
        user_ex varchar(20) not null unique,
	org_1 varchar(50),
        des_1 varchar(30),
	per_1 varchar(10),
        work_1 varchar(20),
        org_2 varchar(50),
        des_2 varchar(30),
	per_2 varchar(10),
        work_2 varchar(20),
        org_3 varchar(50),
        des_3 varchar(30),
	per_3 varchar(10),
        work_3 varchar(20),
        org_4 varchar(50),
        des_4 varchar(30),
	per_4 varchar(10),
        work_4 varchar(20),
        org_5 varchar(50),
        des_5 varchar(30),
	per_5 varchar(10),
        work_5 varchar(20)
        );
        
create view list as select * from users u join personal_info p on u.name=p.user_name join qualifications q on p.user_name=q.user_key join 
experience e on q.user_key=e.user_ex;

create table selected (Appl varchar(20) not null,Name varchar(50) not null,email_id varchar(50) not null,ug_agr float not null,pg_agr float not null);
