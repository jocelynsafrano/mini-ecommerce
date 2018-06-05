<?php 
	//Genos use auto increment field and attribute id as primary key
	// If you want to use another field/attribute as primary key set following variable
	// If it's false you'll have to add attribute primary_key in your class
	$ID_PRIMARY_DEFAULT = true;

	//Table name format
	//Windows is case unsensitive, but database on prod should be case sensitive
	//You have to choose between : lowercase, uppercase, capitalize, custom
	//If you choose personalised you'll have to add attribute table_name in your class

	$TABLE_CASE = "lowercase";

	//DATABASE
	$DATABASE_NAME ='mini-ecommerce';
	$DATABASE_HOST ='localhost';
	$DATABASE_PORT ='3306';
	$DATABASE_USER ='root';
	$DATABASE_PSWD ='';

	define("ID_PRIMARY_DEFAULT",$ID_PRIMARY_DEFAULT);
	define("TABLE_CASE",$TABLE_CASE);
	define("DATABASE_NAME",$DATABASE_NAME);
	define("DATABASE_HOST",$DATABASE_HOST);
	define("DATABASE_PORT",$DATABASE_PORT);
	define("DATABASE_USER",$DATABASE_USER);
	define("DATABASE_PSWD",$DATABASE_PSWD);

	include(__DIR__."/genos.php");