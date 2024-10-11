CREATE TABLE resumes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    uploaded_by_user_id INT,
    name VARCHAR(255) NOT NULL,
    description TEXT NULL,
    status TINYINT DEFAULT 1,
    type TINYINT DEFAULT 0 COMMENT "0->project , 1->BOT",
    link TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (uploaded_by_user_id) REFERENCES users(id) ON DELETE CASCADE
);