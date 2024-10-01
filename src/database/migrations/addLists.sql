CREATE TABLE `addLists` (
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `link` VARCHAR(255) NULL UNIQUE,
  `airdrop_id` INT,
  `uploaded_by_user_id` INT NULL,
  `status` BINARY DEFAULT 1 COMMENT '0 => disable , 1 => enable',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (airdrop_id) REFERENCES airdrops(id) ON DELETE CASCADE,
  FOREIGN KEY (uploaded_by_user_id) REFERENCES users(id) ON DELETE CASCADE
);