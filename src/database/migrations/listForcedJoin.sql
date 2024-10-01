CREATE TABLE listForcedJoin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    channels_count TINYINT NULL,
    caption VARCHAR(255) NULL,
    is_active BINARY DEFAULT 0 COMMENT '0 means not active , 1 means is active',


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    published_at TIMESTAMP NULL

);