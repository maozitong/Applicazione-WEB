# Progetto API RESTful per operazioni CRUD

## CREAZIONE DB
Eseguire gli script presenti nel file database.sql al fine di creare il database, la tabella degli users e popolarla con alcuni dati di test. 

## CONNETTERSI AL DATABASE
Cambiare le credenziali di accesso al db presenti nel file connect.php 
a seconda di quelle presenti sulla vostra macchina. 

## PATH
Cambiare i path presenti nel file index.php. 

In particolare occorre cambiare le seguenti properties:

PROJECT_NAME e PROJECT_PATH.

## TEST
Per testare le API in locale sono state predisposte delle chiamate http nel file curl.http nella cartella test.

Per eseguirle occorre installare l'estensione REST Client 
(https://marketplace.visualstudio.com/items?itemName=humao.rest-client)


Nel file curl.http è possibile lanciare le singole chiamate tramite il tasto "Send request".
