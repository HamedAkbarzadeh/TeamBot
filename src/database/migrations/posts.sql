CREATE TABLE posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    uploaded_by_user_id INT,
    airdrop_id INT NULL COMMENT 'null => common post , not null airdrop post',
    tag VARCHAR(255) NULL,
    caption text NULL,
    media_group_id VARCHAR(128) NULL COMMENT 'if null means single media , if not null means media group',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    published_at TIMESTAMP NULL,

    FOREIGN KEY (uploaded_by_user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (airdrop_id) REFERENCES airdrops(id) ON DELETE CASCADE
);