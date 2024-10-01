CREATE TABLE channels(
    id INT AUTO_INCREMENT PRIMARY KEY,
    channel_id VARCHAR(120) NOT NULL,
    channel_name VARCHAR(64) NOT NULL,
    channel_nick_name VARCHAR(64) NULL,
    owner_user_id INT,
    member_count VARCHAR(20) NULL,
    price VARCHAR(64) NULL,
    type TINYINT DEFAULT 0 COMMENT '0=>channel, 1=>group, 2=>bot',
    referral_link VARCHAR(164) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    expired_at TIMESTAMP NULL,

    FOREIGN KEY (owner_user_id) REFERENCES users(id) ON DELETE CASCADE
);