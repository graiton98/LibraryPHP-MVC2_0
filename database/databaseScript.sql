/* Creating database */
create database LibraryDB;

/* use this DB*/
use LibraryDB;

/* Creating Tables*/


/*type of user:
    1->normal user
    2->librarian
    3->admin
*/
create table TypeOfUser(
    id      int(255)    not null primary key auto_increment,
    name    varchar(20) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table Users(
    id              int(255)     not null primary key auto_increment,
    username        varchar(20)  not null,
    password        varchar(255) not null,
    name_user       varchar(20)  not null,
    first_surname   varchar(50)  not null,
    dni             char(9)      not null,
    email           varchar(50)  not null,
    phone_number    int(9)       not null,
    type_of_user    int(255)     not null default 1,
    CONSTRAINT uq_username  UNIQUE(username),
    CONSTRAINT uq_email     UNIQUE(email),
    CONSTRAINT uq_dni       UNIQUE(dni),
    CONSTRAINT uq_phone     UNIQUE(phone_number),
    CONSTRAINT `fk_Users_typeUser` FOREIGN KEY (`type_of_user`) REFERENCES `TypeOfUser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table Categories(
    id  int(255)    not null primary key auto_increment ,
    name_category    varchar(255),
    CONSTRAINT uq_nom_category  UNIQUE(name_category)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table Authors(
    id              int(255)    not null primary key auto_increment,
    name_author     varchar(20) not null,
    first_surname   varchar(50) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
    Valuation can be:
        -1
        -2
        -3
        -4
        -5
*/
/*image->dni/isbn.jpg // .jpg always or error*/
create table Books(
    id              int(255)    not null auto_increment primary key,
    isbn            char(13)    not null,
    name_book       varchar(40) not null,
    category_id     int(255)    not null,
    author_id       int(255)    not null,
    description     text        not null,
    outstanding     tinyint default 0,
    CONSTRAINT uq_isbn       UNIQUE(isbn),   
    CONSTRAINT `fk_books_authors` FOREIGN KEY (`author_id`) REFERENCES `Authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_books_category` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE 
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table Copy(
    id              int(255)     not null auto_increment,
    id_book_fk      int(255)     not null,
    status          varchar(100) not null,
    primary key (id,id_book_fk),
    CONSTRAINT `fk_copy_books` FOREIGN KEY (`id_book_fk`) REFERENCES `Books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table Reservation(
    id_book_fk         int(255) not null,
    id_username     int(255) not null,
    takenDate       datetime not null,
    primary key (id_book_fk,id_username),
    CONSTRAINT `fk_reservation_book` FOREIGN KEY (`id_book_fk`) REFERENCES `Books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_reservation_user` FOREIGN KEY (`id_username`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE 
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table Borrow(
    id_copy_fk      int(255) not null,
    id_book_copy_fk int(255) not null,
    id_username     int(255) not null,
    takenDate       datetime,
    primary key (id_copy_fk,id_book_copy_fk, id_username),
    CONSTRAINT `fk_borrow_user` FOREIGN KEY (`id_username`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_borrow_copy` FOREIGN KEY (`id_copy_fk`, `id_book_copy_fk`) REFERENCES `Copy` (`id`, `id_book_fk`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
    Type of User
    insert into typeofuser values(null, 'user');
    insert into typeofuser values(null, 'librarian');
    insert into typeofuser values(null, 'admin');

    Users
    insert into users values(null, 'admin', 'admin', 'Biel', 'Lopez', '41511387K', 'graiton98@gmail.com', 610950844, 3);
    insert into users values(null, 'librarian', 'librarian', 'Biel', 'Lopez', '41511387J', 'daw2glopezmonjo@iesjoanramis.org', 610950845, 2);
    insert into users values(null, 'user', 'user', 'Biel', 'Lopez', '41511387L', 'gratasmite@gmail.com', 610950846, 1);


    Categories
    insert into categories values(null, 'Science');
    insert into categories values(null, 'Literature');
    insert into categories values(null, 'Action');
    insert into categories values(null, 'Drama');
    insert into categories values(null, 'Black Novel');
    insert into categories values(null, 'Programming');
    insert into categories values(null, 'Health');
    insert into categories values(null, 'History');
    insert into categories values(null, 'Fantasy');
    insert into categories values(null, 'Music');
    
    Authors
    insert into authors values(null, 'Eva', 'Garcia');
    
    Books
    insert into books values(null, '9788408193296', 'los señores del tiempo', 3, 1, 'La millor novela negra del puto món papa', 1);
    
*/