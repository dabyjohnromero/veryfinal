CREATE DATABASE patientsample;

USE patientsample;

CREATE TABLE patient(
		
	patient_id int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	patient_fname VARCHAR(50),
	patient_mid CHAR(1),
	patient_lname VARCHAR(50),
	patient_gender enum('M','F'),
	patient_address VARCHAR(100),
	patient_contact_num char(12),
	patient_occupation VARCHAR(100),
	patient_status enum('Single','Married')

);

CREATE TABLE services(
	service_id int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	service_name VARCHAR(100),
	service_price char(100)
	
);

CREATE TABLE diagnosis(
	diag_id int (8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	patient_id int(8) NOT NULL,
	compliant char(100),
	dentist_finding char(100),
	service_id int(8) NOT NULL,
	constraint foreign key(patient_id) references patient(patient_id),
	constraint foreign key(service_id) references services(service_id)
	
);

CREATE TABLE employee(
	emp_id int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	emp_name VARCHAR(100),
	emp_type char(50)
);

CREATE TABLE prescription(
	
	pres_id int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	patient_id int(8) NOT NULL,
	diag_id	int(8) NOT NULL,
	emp_id	int(8) NOT NULL,					
	medication varchar(100),			
	dosage varchar(50),		
	time_and_date date,
	constraint foreign key(patient_id) references patient(patient_id),
	constraint foreign key(diag_id) references diagnosis(diag_id),
	constraint foreign key(emp_id) references employee(emp_id)
	
);

CREATE TABLE payment(
	payment_id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	emp_id	int(8),			
	service_price float	,			
	amount float,			
	time_and_date date,		
	constraint foreign key(emp_id) references employee(emp_id)
	
);

CREATE TABLE insurance(
	payment_id	int(10) NOT NULL,			
	amount	float,			
	valid_id int(10) NOT NULL,				
	valid_id_num int(10) NOT NULL,				
	mem_id	varchar(20)	,		
	insurance_type	char(100),
	constraint foreign key(payment_id) references payment(payment_id)
	
);
CREATE TABLE credit(
		payment_id	int(8) NOT NULL,
		cc_type	varchar(100),
		cardnum	char(20),
		cardexp	date,
		terms	char(20),
		amount	float,
		constraint foreign key(payment_id) references payment(payment_id)
);
CREATE TABLE cash(
		payment_id int(8) NOT NULL,
		amount	float,
		constraint foreign key(payment_id) references payment(payment_id)
		
);
