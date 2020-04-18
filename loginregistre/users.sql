

CREATE TABLE users(

    user_id INT auto_increment ,
    user_name  VARCHAR(10) NOT NULL UNIQUE,
    user_mail VARCHAR(100) NOT NULL UNIQUE ,
    user_pass VARCHAR(200) NOT NULL,
    PRIMARY KEY(user_id) 

);