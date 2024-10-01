CREATE TABLE files(
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_id VARCHAR(64) NOT NULL,
    post_id INT,
    file_type VARCHAR(20) NOT NULL,
    file_size VARCHAR(40) NOT NULL,
    `status` BINARY DEFAULT 1 COMMENT '0 means deActive , 1 means active',
    has_spoiler BINARY DEFAULT 0 COMMENT '0 means not have , 1 means have spoiler',


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    published_at TIMESTAMP NULL,

    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);