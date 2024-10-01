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


CREATE TABLE roles(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);


CREATE TABLE permissions(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

CREATE TABLE user_permission(
    user_id INT,
    permission_id INT,

    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE
);

CREATE TABLE user_role(
    user_id INT,
    role_id INT,

    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

CREATE TABLE airdrops(
    id INT AUTO_INCREMENT PRIMARY KEY,
    persian_name VARCHAR(255),
    english_name VARCHAR(255),
    description text NULL,
    link text NULL,
    `status` BINARY DEFAULT 1 COMMENT '0 => disable , 1 => enable',
    `image` TEXT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


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
CREATE TABLE airdrop_tags(
    id INT AUTO_INCREMENT PRIMARY KEY,
    airdrop_id INT,
    tag VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (airdrop_id) REFERENCES airdrops(id) ON DELETE CASCADE
);
CREATE TABLE listForcedJoin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    channels_count TINYINT NULL,
    caption VARCHAR(255) NULL,
    is_active BINARY DEFAULT 0 COMMENT '0 means not active , 1 means is active',


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    published_at TIMESTAMP NULL

);


CREATE TABLE files(
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_id VARCHAR(64) NOT NULL,
    post_id INT,
    file_type VARCHAR(20) NOT NULL,
    file_size VARCHAR(40) NOT NULL,
    `status` BINARY DEFAULT 1 COMMENT '0 means deActive , 1 means active',
    has_spoiler BINARY DEFAULT 0 COMMENT '0 means not have , 1 means have spoiler',


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    published_at TIMESTAMP NULL,

    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);


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


CREATE TABLE channel_user(
    user_id INT,
    channel_id iNT,
    joined_at TIMESTAMP  DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (channel_id) REFERENCES channels(id) ON DELETE CASCADE

);

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