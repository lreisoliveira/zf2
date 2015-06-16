ZF2
=============

Projeto em Zend Framework 2 com módulos de referência

1) Módulo Soap

	Server:
		http://HOST/server-soap/

	WSDL:	
		http://HOST/server-soap/?wsdl

	Client:
		http://HOST/client-soap/
	

	onde está HOST é o nome do domínio configurado no servidor.	

2) Módulo Rest

	Client:
		http://HOST/client-rest/post.xml
		http://HOST/client-rest/put.xml
		http://HOST/client-rest/delete.xml
		http://HOST/client-rest/get.xml
		
		http://HOST/client-rest/post.json
		http://HOST/client-rest/put.json
		http://HOST/client-rest/delete.json
		http://HOST/client-rest/get.json
		
		-- post,put,delete e get são os verbos http
		-- .xml ou .json são os formatos de retorno solicitados

	Server:
		http://HOST/server-rest/

	onde está HOST é o nome do domínio configurado no servidor.	


