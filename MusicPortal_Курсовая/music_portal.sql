drop database if exists music_portal;

create database music_portal;
use music_portal;

create table Roles
(
	Id int not null auto_increment primary key,
    Role varchar(20) not null
);

create table Users
(
	Id int not null auto_increment primary key,
    Surname varchar(30) not null default "",
    Name varchar(20) not null default "",
    Secondname varchar(30) not null default "",
    Date date,
    Login varchar(20) not null unique,
    Password varchar(40),
    Role int default 1,
    foreign key (Role) references Roles (Id),
    Link varchar(100) not null default ""
);

create table Musics
(
	Id int not null auto_increment primary key,
    Id_user int, 
    foreign key (Id_user) references Users (Id) on delete cascade,
    MusicName varchar(50) not null,
    Link varchar(100) not null

);

insert into Roles (Role) values ("Пользователь");
insert into Roles (Role) values ("Администратор");
insert into Users (Surname, Name, Secondname, Date, Login, Password, Role) values ("admin", "admin", "admin", "2022-01-23", "admin", "1234", 2);
select Login, Roles.Role from Users join Roles on Users.Role = Roles.Id;




