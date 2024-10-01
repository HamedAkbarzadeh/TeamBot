CREATE TABLE airdrops(
    id INT AUTO_INCREMENT PRIMARY KEY,
    persian_name VARCHAR(255),
    english_name VARCHAR(255),
    description text NULL,
    link text NULL,
    `status` BINARY DEFAULT 1 COMMENT '0 => disable , 1 => enable',
    `image` TEXT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);