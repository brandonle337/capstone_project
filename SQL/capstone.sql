CREATE TABLE author (
	author_id INT NOT NULL AUTO_INCREMENT, 
	first_name VARCHAR(255), 
	middle_initial CHAR(1), 
	last_name VARCHAR(255), 
	address VARCHAR(255), 
	PRIMARY KEY (author_id));
CREATE TABLE publication (
	publication_id INT NOT NULL AUTO_INCREMENT, 
	title VARCHAR(255), 
	issn_web VARCHAR(255), 
	PRIMARY KEY (publication_id));
CREATE TABLE keyword (
	keyword_id INT NOT NULL AUTO_INCREMENT, 
	keyword_term VARCHAR(255), 
	PRIMARY KEY (keyword_id));
CREATE TABLE database (
	database_id INT NOT NULL AUTO_INCREMENT, 
	name VARCHAR(255), 
	provider VARCHAR(255), 
	PRIMARY KEY (database_id));

CREATE TABLE article (
	article_id INT NOT NULL AUTO_INCREMENT, 
	title VARCHAR(255),
	database_id INT NOT NULL,
	publication_id INT NOT NULL,
	publication_date DATE, 
	volume SMALLINT,
	issue SMALLINT,
	pages SMALLINT,
	start_page SMALLINT,
	epub_date DATE,
	article_type VARCHAR(255),
	short_title VARCHAR(255),
	alternate_publication_id INT NOT NULL,
	DOI VARCHAR(255),
	original_publication_id INT NOT NULL,
	reprint_edition SMALLINT,
	reviewed_item VARCHAR(255),
	legal_note TEXT,
	PMCID VARCHAR(255),
	NIHMSID VARCHAR(255),
	article_number SMALLINT,
	accession_number SMALLINT,
	call_number VARCHAR(255),
	label VARCHAR(255),
	abstract TEXT,
	notes TEXT,
	research_notes TEXT,
	URL TEXT,
	file_attachment_path VARCHAR(255),
	figure VARCHAR(255),
	caption TEXT,
	access_date DATE,
	translated_author VARCHAR(255),
	translated_title VARCHAR(255),
	article_language VARCHAR(255), 
	PRIMARY KEY (article_id),
	FOREIGN KEY (database_id) REFERENCES database(database_id), 
	FOREIGN KEY (publication_id) REFERENCES publication(publication_id),
	FOREIGN KEY (alternate_publication_id) REFERENCES publication(publication_id),
	FOREIGN KEY (original_publication_id) REFERENCES publication(publication_id));

CREATE TABLE article_author (
	article_id INT NOT NULL, 
	author_id INT NOT NULL, 
	FOREIGN KEY (article_id) REFERENCES article(article_id), 
	FOREIGN KEY (author_id) REFERENCES author(author_id)); 
CREATE TABLE article_collaborator (
	article_id INT NOT NULL, 
	collaborator_id INT NOT NULL, 
	FOREIGN KEY (article_id) REFERENCES article(article_id), 
	FOREIGN KEY (collaborator_id) REFERENCES author(author_id)); 
CREATE TABLE article_keyword (
	article_id INT NOT NULL, 
	keyword_id INT NOT NULL, 
	FOREIGN KEY (article_id) REFERENCES article(article_id), 
	FOREIGN KEY (keyword_id) REFERENCES keyword(keyword_id)); 