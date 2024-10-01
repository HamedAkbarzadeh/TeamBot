CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(255) NOT NULL UNIQUE,
    first_name VARCHAR(64) NOT NULL,
    last_name VARCHAR(64) NULL,
    username VARCHAR(64) NULL,
    phone VARCHAR(20) NULL,
    email VARCHAR(255) NULL UNIQUE,
    national_number VARCHAR(20) UNIQUE NULL,
    step VARCHAR(30) NULL,
    invited_by_user_id INT,
    status_bot_used BINARY DEFAULT 0 COMMENT '0 means bot not used, 1 means bot used',
    invite_link VARCHAR(100) NOT NULL UNIQUE,
    is_bot BINARY DEFAULT 0 COMMENT '0 means person, 1 means is bot',
    is_banned BINARY DEFAULT 0 COMMENT '0 means not banned, 1 means is banned',
    is_permium BINARY DEFAULT 0 COMMENT '0 means not perimum, 1 means is perimum',
    is_admin BINARY DEFAULT 0 COMMENT '0 means not admin, 1 means is admin',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    deleted_at TIMESTAMP NULL,

    FOREIGN KEY (invited_by_user_id) REFERENCES users(id) ON DELETE SET NULL
);