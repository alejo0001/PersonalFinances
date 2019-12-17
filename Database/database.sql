CREATE DATABASE personal_finances;

USE personal_finances;

CREATE TABLE users	
(
	id			int(255) auto_increment not null,
	name		varchar(255) not null,
	last_name	varchar(255),
	email		varchar(255) not null,
	password	varchar(255) not null,
	role		varchar(255),
	image		varchar(255),

	CONSTRAINT pk_users PRIMARY KEY(id),
	CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDB;

CREATE TABLE accounts
(
	id				int(255) auto_increment not null,
	name			varchar(255) not null,
	user_id			int(255) not null,
	initial_balance	float(255,2),
	CONSTRAINT pk_accounts PRIMARY KEY(id),
	CONSTRAINT fk_user_accounts FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDB;


CREATE TABLE categories
(
	id		int(255) auto_increment not null,
	name	varchar(255) not null,
	user_id	int(255) not null,
	CONSTRAINT pk_categories PRIMARY KEY (id),
	CONSTRAINT fk_user_categories FOREIGN KEY(user_id) REFERENCES users(id)

)ENGINE=InnoDB;

CREATE TABLE subcategories
(
	id			int(255) auto_increment not null,
	name		varchar(255) not null,
	category_id	int(255) not null,
	CONSTRAINT	pk_subcategories PRIMARY KEY(id),
	CONSTRAINT  fk_categories_sub FOREIGN KEY(category_id) REFERENCES categories(id)
	

)ENGINE=InnoDB;

CREATE TABLE movements
(
	id				int(255) auto_increment not null,
	title			varchar(255) not null,
	date			date not null,
	amount			float(255,2) not null,
	type			varchar(255) not null,
	category_id		int(255) not null,
	subcategory_id	int(255),
	account_id		int(255) not null,
	description		text,

	CONSTRAINT pk_movements PRIMARY KEY (id),
	CONSTRAINT fk_movement_category FOREIGN KEY(category_id) REFERENCES categories(id),
	CONSTRAINT fk_movement_account FOREIGN KEY(account_id) REFERENCES accounts(id)
)ENGINE=InnoDB;

