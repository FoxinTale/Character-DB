use woodhouse;

DROP TABLE IF EXISTS gdoc;
DROP TABLE IF EXISTS spell;
DROP TABLE IF EXISTS item;
DROP TABLE IF EXISTS weapon;
DROP TABLE IF EXISTS char_other;
DROP TABLE if EXISTS char_race;
DROP TABLE IF EXISTS char_outfit;
DROP TABLE IF EXISTS char_stat;
DROP TABLE IF EXISTS char_pers;
DROP TABLE IF EXISTS char_appear;
DROP TABLE IF EXISTS char_info;
DROP TABLE IF EXISTS user_info;

CREATE TABLE user_info (
	user_name VARCHAR(255) NOT NULL,
	password varchar(255),
	is_admin boolean DEFAULT false,
	PRIMARY KEY (user_name)
);

CREATE TABLE char_info(
	char_id bigint NOT NULL AUTO_INCREMENT,
	user_name varchar(255),
	isFav boolean DEFAULT false,
	char_fullname varchar(512),
	char_name varchar(255),
	char_alias varchar(255),
	char_desc varchar(2048),
	char_age  varchar(64),
	char_gender varchar(64),
	char_sexuality varchar(64),
	char_race varchar(64),
	char_status varchar(128),
	char_soul varchar(128),
	char_other varchar(255),
	PRIMARY KEY(char_id),
	FOREIGN KEY(user_name) REFERENCES user_info(user_name)
);

CREATE TABLE char_appear(
	app_id bigint NOT NULL AUTO_INCREMENT,
	char_id  bigint,
	char_name varchar(255),
	app_eyes varchar(255),
	app_hair varchar(255),
	app_ears varchar(255),
	app_height varchar(255),
	app_weight varchar(255),
	app_skin varchar(255),
	app_unique varchar(255),
	app_other varchar(512),
	app_image varchar(1024) DEFAULT "images/defaultchar.png",
	PRIMARY KEY(app_id),
	FOREIGN KEY(char_id) REFERENCES char_info(char_id)
);

CREATE TABLE char_pers(
	pers_id bigint NOT NULL AUTO_INCREMENT,
	char_id bigint,
	char_name varchar(255),
	pers_act varchar(512),
	pers_agree varchar(512),
	pers_assert varchar(512),
	pers_conf varchar(512),
	pers_disc varchar(512),
	pers_emocap varchar(512),
	pers_friend varchar(512),
	pers_honest varchar(512),
	pers_intel varchar(512),
	pers_manner varchar(512),
	pers_pos varchar(512),
	pers_rebel varchar(512),
	pers_type varchar(512),
	pers_desc varchar(2048),
	PRIMARY KEY(pers_id),
	FOREIGN KEY(char_id) REFERENCES char_info(char_id)
);

CREATE TABLE char_stat(
	stat_id bigint NOT NULL AUTO_INCREMENT,
	char_id bigint,
	char_name varchar(255),
	stat_health varchar(255),
	stat_stam varchar(255),
	stat_mana varchar(255),
	stat_level varchar(255),
	stat_exp varchar(255),
	stat_agile varchar(255),
	stat_strength varchar(255),
	stat_charisma varchar(255),
	stat_percep varchar(255),
	PRIMARY KEY(stat_id),
	FOREIGN KEY(char_id) REFERENCES char_info(char_id)
);

CREATE TABLE char_outfit(
	outfit_id int NOT NULL AUTO_INCREMENT,
	char_id bigint,
	char_name varchar(255),
	outfit_name varchar(255),
	outfit_glasses varchar(255),
	outfit_top varchar(1024),
	outfit_bottom varchar(1024),
	outfit_footwear varchar(1024),
	outfit_jewlery varchar(1024),
	PRIMARY KEY(outfit_id),
	FOREIGN KEY(char_id) REFERENCES char_info(char_id)
);

CREATE TABLE char_race(
	race_id bigint NOT NULL AUTO_INCREMENT,
	char_id bigint,
	char_name varchar(255),
	race_name varchar(255),
	race_home varchar(255),
	race_age varchar(255),
	race_height varchar(255),
	race_aspect varchar(1024),
	race_desc text,
	PRIMARY KEY(race_id),
	FOREIGN KEY(char_id) REFERENCES char_info(char_id)
);

CREATE TABLE char_other(
	other_id bigint NOT NULL  AUTO_INCREMENT,
	char_id bigint, 
	char_name varchar(255),
	other_theme varchar(512),
	other_quotes tinytext,
	other_quirks tinytext,
	other_quirkinfo text,
	other_weak tinytext,
	other_backstory text,
	other_bday varchar(255),
	other_zodiac varchar(255),
	other_hobbies tinytext,
	other_other text,
	PRIMARY KEY(other_id),
	FOREIGN KEY(char_id) REFERENCES char_info(char_id)
);

CREATE TABLE weapon(
	weap_id int NOT NULL AUTO_INCREMENT,
	user_name varchar(255),
	weap_name varchar(255),
	char_name varchar(255),
	weap_desc  varchar(1024),
	weap_appear varchar(1024),
	weap_type varchar(255),
	weap_size varchar(255),
	weap_hand varchar(255),
	weap_effect varchar(1024),
	weap_cond varchar(1024),
	weap_value varchar(255),
	PRIMARY KEY(weap_id),
	FOREIGN KEY(user_name) REFERENCES user_info(user_name)
);

CREATE TABLE item(
	item_id bigint NOT NULL AUTO_INCREMENT,
	user_name varchar(255),
	item_name varchar(255),
	char_name varchar(255), 
	item_desc varchar(1024),
	item_appear varchar(1024),
	item_type varchar(255),
	item_size varchar(255),
	item_loc varchar(255),
	item_effects varchar(1024),
	item_cond varchar(1024),
	item_value varchar(255),
	PRIMARY KEY(item_id),
	FOREIGN KEY(user_name) REFERENCES user_info(user_name)
);

CREATE TABLE spell(
	spell_id bigint NOT NULL AUTO_INCREMENT,
	user_name varchar(255),
	spell_name varchar(255),
	char_name varchar(255),
	spell_desc varchar(1024),
	spell_desc_ext varchar(1024),
	spell_type varchar(256),
	spell_school varchar(256),
	spell_range varchar(256),
	spell_duration varchar(255),
	spell_cast varchar(255),
	spell_dmg varchar(255),
	spell_level varchar(256),
	spell_ritual varchar(1024),
	spell_materials varchar(1024),
    PRIMARY KEY(spell_id),
	FOREIGN KEY(user_name) REFERENCES user_info(user_name)
);

CREATE TABLE gdoc(
	doc_id int NOT NULL AUTO_INCREMENT,
	user_name varchar(255),
	doc_link varchar(1024),
	PRIMARY KEY(doc_id),
	FOREIGN KEY(user_name) REFERENCES user_info(user_name)
);
