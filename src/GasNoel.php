<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 8/06/18
 * Time: 01:39 PM
 */

namespace inquid\gas;


use yii\base\Component;
use yii\httpclient\Client;
use yii\httpclient\Response;

/**
 *
 * @property void $distributionCenters
 * @property void $customerInfo
 * @property void $salesByClient
 */
class GasNoel extends Component
{
    public $username = "";
    public $password = "";
    public $url = "http://108.161.136.163:8900/integrationAPI/callCenter";
    /**
     * @var Client $client
     */
    public $client;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->client = new Client();
    }

    /**
    $gas = new \app\components\GasNoel();
    print_r($gas->signUp([
    'address' => ["colony" => "", "country" => "", "extN" => "", "intN" => "", "locality" => "", "municipality" => "", "postalCode" => "", "reference" => "", "state" => "", "street" => ""],
    'code' => null,
    "denialOfService" => false,
    "email" => "",
    'fiscalAddress' => ["colony" => "Antiguo Country", "country" => "México", "extN" => "", "intN" => "", "locality" => "", "municipality" => "", "postalCode" => "", "reference" => "", "state" => "", "street" => ""],
    "name" => "",
    "nationalFiscalIdentity" => "",
    "order" => null,
    "password" => "",
    "phone" => "",
    "products" => null,
    "rewardPoints" => null,
    "totalSales" => null
    ]));
     * @param array $user
     * @return
     * @throws \yii\httpclient\Exception
     */
    public function signUp(array  $user)
    {
        /**
         * @var Response $response;
         */
        $response = $this->client->createRequest()
            ->setMethod('POST')
            ->setUrl("{$this->url}/register")
            ->setFormat(Client::FORMAT_JSON)
            ->setData($user)
            ->send();
        return $response->isOk ? ['success' => true, 'code' => $response->getStatusCode(), 'data' => $response->content] : ['success' => false, 'code' => $response->getStatusCode(), 'data' => $response->content];
    }

    /**
     * print_r($gas->login('email@email.com','123456'));
     * @param $username
     * @param $password
     * @return array
     * @throws \yii\httpclient\Exception
     */
    public function login($username,$password)
    {
        /**
         * @var Response $response;
         */
        $response = $this->client->createRequest()
            ->setMethod('POST')
            ->setUrl("{$this->url}/auth")
            ->setFormat(Client::FORMAT_JSON)
            ->setData(['email'=>$username,'password'=>$password])
            ->send();
        return $response->isOk ? ['success' => true, 'code' => $response->getStatusCode(), 'data' => $response->content] : ['success' => false, 'code' => $response->getStatusCode(), 'data' => $response->content];
    }

    /**
     * print_r($gas->getDistributionCenters());
     * @return array
     * @throws \yii\httpclient\Exception
     */
    public function getDistributionCenters(){
        /**
         * @var Response $response;
         */
        $response = $this->client->createRequest()
            ->setMethod('GET')
            ->setUrl("{$this->url}/distributionCenters")
            ->setFormat(Client::FORMAT_JSON)
            ->send();
        return $response->isOk ? ['success' => true, 'code' => $response->getStatusCode(), 'data' => $response->content] : ['success' => false, 'code' => $response->getStatusCode(), 'data' => $response->content];
    }

    /**
     * @param $client
     * @return array
     * @throws \yii\httpclient\Exception
     */
    public function getSalesByClient($client){
        /**
         * @var Response $response;
         */
        $response = $this->client->createRequest()
            ->setMethod('GET')
            ->setUrl("{$this->url}/sales/{$client}")
            ->setFormat(Client::FORMAT_JSON)
            ->send();
        return $response->isOk ? ['success' => true, 'code' => $response->getStatusCode(), 'data' => $response->content] : ['success' => false, 'code' => $response->getStatusCode(), 'data' => $response->content];
    }

    /**
     * @param $client
     * @return array
     * @throws \yii\httpclient\Exception
     */
    public function getCustomerInfo($client){
        /**
         * @var Response $response;
         */
        $response = $this->client->createRequest()
            ->setMethod('GET')
            ->setUrl("{$this->url}/sales/{$client}")
            ->setFormat(Client::FORMAT_JSON)
            ->send();
        return $response->isOk ? ['success' => true, 'code' => $response->getStatusCode(), 'data' => $response->content] : ['success' => false, 'code' => $response->getStatusCode(), 'data' => $response->content];
    }

    /**
     * @param array $user
     * @return array
     * @throws \yii\httpclient\Exception
     */
    public function updateCustomer(array  $user){
        /**
         * @var Response $response;
         */
        $response = $this->client->createRequest()
            ->setMethod('POST')
            ->setUrl("{$this->url}/updateCustomerFromApp")
            ->setFormat(Client::FORMAT_JSON)
            ->setData($user)
            ->send();
        return $response->isOk ? ['success' => true, 'code' => $response->getStatusCode(), 'data' => $response->content] : ['success' => false, 'code' => $response->getStatusCode(), 'data' => $response->content];
    }

    /**
     * @param $comment
     * @return array
     * @throws \yii\httpclient\Exception
     */
    public function sendComment($comment){
        /**
         * @var Response $response;
         * {"customer":{"address":{"colony":"","country":"","extN":"","intN":"","locality":"","municipality":"","postalCode":"","reference":"","state":"","street":""},"code":"","denialOfService":"false","email":"","fiscalAddress":{"colony":"","country":"","extN":"","intN":"","locality":"","municipality":"","postalCode":"","reference":"","state":"","street":""},"name":"","nationalFiscalIdentity":"","order":null,"password":"","phone":"","products":[{"id":"1","name":"Gas LP (Lt)","price":"9.44"},{"id":"2","name":"Gas LP (Kg)","price":null},{"id":"4","name":"Cilindro 10 (Kg)","price":"174.8"},{"id":"5","name":"Cilindro 20 (Kg)","price":"349.6"},{"id":"6","name":"Cilindro 30 (Kg)","price":"524.4"},{"id":"7","name":"Cilindro 45 (Kg)","price":"786.6"}],"rewardPoints":0,"totalSales":0},"message":" ","subject":"Comentario levantado desde aplicación Android email:  nombre: "}
         */
        $response = $this->client->createRequest()
            ->setMethod('POST')
            ->setUrl("{$this->url}/comments")
            ->setFormat(Client::FORMAT_JSON)
            ->setData($comment)
            ->send();
        return $response->isOk ? ['success' => true, 'code' => $response->getStatusCode(), 'data' => $response->content] : ['success' => false, 'code' => $response->getStatusCode(), 'data' => $response->content];
    }

    /**
     * {"email":"xxx@xxxx.com","total":800,"amount":null,"productId":"1"}
     * @param $service
     * @return array
     */
    public function requestService($service){
        $response = $this->client->createRequest()
            ->setMethod('POST')
            ->setUrl("{$this->url}/order")
            ->setFormat(Client::FORMAT_JSON)
            ->setData($service)
            ->send();
        return $response->isOk ? ['success' => true, 'code' => $response->getStatusCode(), 'data' => $response->content] : ['success' => false, 'code' => $response->getStatusCode(), 'data' => $response->content];
    }
}
