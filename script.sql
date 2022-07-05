create table status
(
    id       int auto_increment
        primary key,
    pending  int not null,
    approved int not null,
    rejected int not null
);

create table user
(
    id         int auto_increment
        primary key,
    login      varchar(250) not null,
    last_name  varchar(250) not null,
    first_name varchar(250) not null,
    password   varchar(250) not null,
    email      varchar(255) not null
);

create table articles
(
    id             int auto_increment
        primary key,
    image_link     varchar(250) not null,
    content        text         not null,
    title          varchar(255) not null,
    firstName_User varchar(250) not null,
    created_at     datetime     not null,
    created_by     int          not null,
    `update`       datetime     not null,
    slug           varchar(255) not null,
    constraint articles_ibfk_1
        foreign key (created_by) references user (id)
);

create index created_by
    on articles (created_by);

create table comments
(
    id         int auto_increment
        primary key,
    author     int      not null,
    article    int      not null,
    content    longtext not null,
    created_by int      not null,
    created_at datetime not null,
    idArticle  int      not null,
    idStatus   int      not null,
    constraint comments_ibfk_1
        foreign key (created_by) references user (id),
    constraint comments_ibfk_2
        foreign key (idArticle) references articles (id),
    constraint comments_ibfk_3
        foreign key (idStatus) references status (id)
);

create index created_by
    on comments (created_by);


