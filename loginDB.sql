drop database if exists Beretta;
create database Beretta;
use Beretta;

create table users (
	ID integer primary key auto_increment,
	email varchar(70) not null unique,
	nome varchar(50) not null,
    cognome varchar(50) not null,
    dataNascita date,
    numero varchar(15),
    nazione varchar(50) not null,
    password varchar(255) not null
);


drop table if exists prodotti;
create table Prodotti (
	ID integer primary key auto_increment,
    nome varchar(50),
    colore varchar(50),
    taglia char default 'n',
    prezzo double,
    urlImage varchar(100),
    categoria varchar(50),
    vendibileOnline boolean
);

drop table if exists carrello;
create table carrello (
	users integer,
    prodotto integer,
    quantità integer,
    
    index users_index(users),
    index prodotto_index(prodotto),
    
    foreign key (users) references Users(ID),
    foreign key (prodotto) references Prodotti(ID)
);

drop table if exists preferiti;
create table preferiti (
	users integer,
    prodotto integer,
    
    primary key(users, prodotto),
    
    index users_index(users),
    index prodotto_index(prodotto),
    
    foreign key (users) references Users(ID),
    foreign key (prodotto) references Prodotti(ID)
);

/*
drop trigger if exists trigUser;
delimiter //
create trigger trigUser
before insert on users
for each row
begin
	if exists (select * from users where email = new.email) then
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Email già in uso';
	end if;    
end //
delimiter ;
*/
select * from users;
select * from prodotti;
select * from carrello;

delete from carrello where users = 1 AND prodotto = 6 limit 1;