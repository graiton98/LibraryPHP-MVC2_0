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
    password        VARBINARY(255) not null,
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
    extImage        varchar(5)  not null,
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
    code            int(255)  not null auto_increment primary key,
    id_book_fk      int(255) not null,
    id_username     int(255) not null,
    takenDate       date not null,
    /*primary key (id_book_fk,id_username),*/
    CONSTRAINT `fk_reservation_book` FOREIGN KEY (`id_book_fk`) REFERENCES `Books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_reservation_user` FOREIGN KEY (`id_username`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE 
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table Borrow(
    id              int(255) not null auto_increment primary key,
    id_copy_fk      int(255) not null,
    id_book_copy_fk int(255) not null,
    id_username     int(255) not null,
    takenDate       date not null,
    returnDate      date,
    /*primary key (id_copy_fk,id_book_copy_fk, id_username),*/
    CONSTRAINT `fk_borrow_user` FOREIGN KEY (`id_username`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_borrow_copy` FOREIGN KEY (`id_copy_fk`, `id_book_copy_fk`) REFERENCES `Copy` (`id`, `id_book_fk`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
    Type of User
    insert into typeofuser values(null, 'user');
    insert into typeofuser values(null, 'librarian');
    insert into typeofuser values(null, 'admin');

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

    insert into authors values(null, 'Alan', 'Lightman');
    insert into authors values(null, 'Richard', 'Dawkins');
    insert into authors values(null, 'Stephen', 'Hawking');
    insert into authors values(null, 'Charles', 'Darwin');
    insert into authors values(null, 'Ben', 'Goldacre');


    insert into authors values(null, 'Harper', 'Lee');
    insert into authors values(null, 'George', 'Orwell');
    insert into authors values(null, 'Jane', 'Austen');
    
    Books
    insert into books values(null, '9788408193296', 'los señores del tiempo', 5, 1, 'La millor novela negra del puto món papa', 1);



    https://www.geekwrapped.com/posts/the-50-best-science-books
    https://www.goodreads.com/shelf/show/literature
    */
    /*
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


    insert into books values(null, '9780345805959', 'The Accidental Universe', 1, 1, 'Theoretical physicist and novelist Lightman presents seven elegantly provocative “universe” essays that elucidate complex scientific thought in the context of everyday experiences and concerns. He also explores the emotional and philosophical questions raised by recent discoveries in science.', null, null, null);
    insert into books values(null, '9780061120084', 'The Blind Watchmaker', 1, 2, 'IIn the eighteenth century, theologian William Paley developed a famous metaphor for creationism: that of the skilled watchmaker. In The Blind Watchmaker, Richard Dawkins crafts an elegant riposte to show that the complex process of Darwinian natural selection is unconscious and automatic.', null, null, null);
    insert into books values(null, '9780553380163', 'A Brief History of Time', 1, 3, 'A landmark volume in science writing by one of the great minds of our time, Stephen Hawking’s book explores such profound questions as: How did the universe begin—and what made its start possible? Does time always flow forward? Is the universe unending? A classic.', null, null, null);
    insert into books values(null, '9780451529060', 'The Origin of Species', 1, 4, 'The classic that exploded into public controversy, revolutionized the course of science, and continues to transform our views of the world. Darwin published The Origin of Species in 1859 despite resistance from the orthodox scientific and religious communities.', null, null, null);
    insert into books values(null, '9780865479180', 'Bad Science', 1, 5, 'Ben Goldacre has made a point of exposing quack doctors and nutritionists, bogus credentialing programs, and biased scientific studies. He is here to teach you how to evaluate placebo effects, double-blind studies, and sample sizes, so that you can recognize bad science when you see it.', null, null, null);
    
    insert into books values(null, '9780345805959', 'To Kill a Mockingbird', 1, 6, 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.', null, null, null);
    insert into books values(null, '9780140817744', '1984', 1, 7, 'Among the seminal texts of the 20th century, Nineteen Eighty-Four is a rare work that grows more haunting as its futuristic purgatory becomes more real. Published in 1949, the book offers political satirist George Orwell's nightmare vision of a totalitarian, bureaucratic world and one poor stiff's attempt to find individuality.', null, null, null);
    insert into books values(null, '9780553380163', 'Pride and Prejudice', 1, 8, 'Since its immediate success in 1813, Pride and Prejudice has remained one of the most popular novels in the English language. Jane Austen called this brilliant work "her own darling child" and its vivacious heroine, Elizabeth Bennet, "as delightful a creature as ever appeared in print." The romantic clash between the opinionated Elizabeth and her proud beau, Mr. Darcy, is a splendid performance of civilized sparring.', null, null, null);
    
    insert into books values(null, '9780451529060', 'The Origin of Species', 1, 4, 'The classic that exploded into public controversy, revolutionized the course of science, and continues to transform our views of the world. Darwin published The Origin of Species in 1859 despite resistance from the orthodox scientific and religious communities.', null, null, null);
    insert into books values(null, '9780865479180', 'Bad Science', 1, 5, 'Ben Goldacre has made a point of exposing quack doctors and nutritionists, bogus credentialing programs, and biased scientific studies. He is here to teach you how to evaluate placebo effects, double-blind studies, and sample sizes, so that you can recognize bad science when you see it.', null, null, null);

    Copies

    insert into copy values(null, 1, 'Perfect');
    insert into copy values(null, 1, 'Perfect');
    insert into copy values(null, 1, 'Perfect');
    insert into copy values(null, 1, 'Perfect');
    insert into copy values(null, 1, 'Perfect');

    Reserves
    INSERT INTO `reservation` (`code`, `id_book_fk`, `id_username`, `takenDate`) VALUES (NULL, '1', '1', '2019-01-03');

    
*/