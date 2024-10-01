CREATE TABLE airdrop_tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    airdrop_id INT,
    tag VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (airdrop_id) REFERENCES airdrops(id) ON DELETE CASCADE
);