CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id TEXT NOT NULL UNIQUE,
    first_name VARCHAR(64) NOT NULL,
    last_name VARCHAR(64) NULL,
    username VARCHAR(64) NULL,
    phone VARCHAR(20) NULL,
    email VARCHAR(255) NULL UNIQUE,
    national_number VARCHAR(20) UNIQUE NULL,
    step TEXT NULL,
    status_bot_used TINYINT DEFAULT 0 COMMENT '0 means bot not used, 1 means bot used',
    is_bot TINYINT DEFAULT 0 COMMENT '0 means person, 1 means is bot',
    is_banned TINYINT DEFAULT 0 COMMENT '0 means not banned, 1 means is banned',
    is_permium TINYINT DEFAULT 0 COMMENT '0 means not perimum, 1 means is perimum',
    is_admin TINYINT DEFAULT 0 COMMENT '0 means not admin, 1 means is admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    deleted_at TIMESTAMP NULL
);