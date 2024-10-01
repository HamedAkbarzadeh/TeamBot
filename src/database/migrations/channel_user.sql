CREATE TABLE channel_user(
    user_id INT,
    channel_id iNT,
    joined_at TIMESTAMP  DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (channel_id) REFERENCES channels(id) ON DELETE CASCADE

);