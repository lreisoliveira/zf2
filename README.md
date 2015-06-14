lreisoliveira
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
		http://HOST/client-soap/post.xml
		http://HOST/client-soap/put.xml
		http://HOST/client-soap/delete.xml
		http://HOST/client-soap/get.xml
		
		http://HOST/client-soap/post.json
		http://HOST/client-soap/put.json
		http://HOST/client-soap/delete.json
		http://HOST/client-soap/get.json
		
		-- post,put,delete e get são os verbos http
		-- .xml ou .json são os formatos de retorno solicitados

	Server:
		http://HOST/server-rest/

	onde está HOST é o nome do domínio configurado no servidor.	


