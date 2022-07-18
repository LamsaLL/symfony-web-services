<?php
function displayRequestResponse($soapClient)
{
    echo 'Request : <br/><xmp>',
    $soapClient->__getLastRequestHeaders(), $soapClient->__getLastRequest(),
    '</xmp>';
    echo 'Response : <br/><xmp>',
    $soapClient->__getLastResponseHeaders(), $soapClient->__getLastResponse(),
    '</xmp>';
}


require('ProductSoap.php');
use \App\Soap\ProductSoap;
require('CategorySoap.php');
use \App\Soap\CategorySoap;

$soapClient = null;
try {

    ini_set("soap.wsdl_cache_enabled", "0");

    // $opts = array(
    //     'http' => array(
    //         'user_agent' => 'PHPSoapClient',
    //         //'header' => 'Content-Type: text/xml'
    //     )
    // );
    // $context = stream_context_create($opts);

    $options = array(
        'trace' => 1,
        'exceptions' => 1,
        'connection_timeout' => 180,
        'encoding' => 'UTF-8',
        'soap_version' => SOAP_1_1,
        // 'stream_context' => $context,
        'cache_wsdl' => WSDL_CACHE_NONE/*,
		'use' => SOAP_LITERAL,
		'style' => SOAP_DOCUMENT*/
    );

    $soapClient =  new \SoapClient('http://localhost:8000/soap?wsdl', $options);
    //header('Content-Type: text/xml');
    //$soapClient->__setSoapHeaders(new SoapHeader('Content-Type','text/xml'));

    $functions = $soapClient->__getFunctions();
    var_dump($functions);
    // displayRequestResponse($soapClient);

    //header('Content-Type: text/xml');
    //$soapClient->__setSoapHeaders(new SoapHeader('Content-Type','text/xml'));

    $result = $soapClient->__soapcall("sayHello", array("name" => "Jean"));
    echo '<p>' . $result . '</p>';
    displayRequestResponse($soapClient);

    $result = $soapClient->sumHello(2, 5);
    echo '<p>' . $result . '</p>';
    displayRequestResponse($soapClient);

    $result = $soapClient->sumFloats(2.2, 5.3, 3.7);
    echo '<p>' . $result . '</p>';
    displayRequestResponse($soapClient);

    echo '<p> Retrouver un article par son id :</p>';
    $prod = new ProductSoap(1, 'Pomme', 'Elle est bonne pour la tienne', 'images/pommes.jpg', '3.42');
    echo '<p>'.var_dump($prod).'</p>';
    $result = $soapClient->getProductById(1);
    var_dump($result);
    echo "<p> Nom de l'article  : " . $result->name . "</p>";
    displayRequestResponse($soapClient);

    //Function soap get Categorie of an article
    echo "<p> Retrouver la catégorie d'un article</p>";
    $result = $soapClient->getCategoryByProductId(1);
    var_dump($result);
    echo "<p> Nom de la catégorie  : " . $result->name . "</p>";
    displayRequestResponse($soapClient);

    echo '<p> Retrouver tous les articles de la base:</p>';
    $result = $soapClient->getAllProducts();
    var_dump($result);
    displayRequestResponse($soapClient);

} catch (SoapFault $fault) {
    displayRequestResponse($soapClient);
    // <xmp> tag displays xml output in html
    echo '<br/><br/> Error Message : <br/>';
    $fault->getMessage();
    $fault->getTraceAsString();
    var_dump($fault);
}