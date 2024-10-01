CREATE TABLE bans(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    banned_by_admin_id INT,
    caption TEXT NULL,
    ban_days VARCHAR(64) NULL,

    start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    end_date TIMESTAMP NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (banned_by_admin_id) REFERENCES users(id)
);