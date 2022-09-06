<?php


// namespace App\Http\Services;
// use GazzleHttp\cliant;
// use GuzzleHttp\Client;
// use illuminate\Database\Eloquent\Model;
// //use Illuminate\Http\Request;
// use GazzleHttp\psr7\Request;


// class FatoorahServices{
// private $base_url;
// private $headers;
// private $request_client;

// /**
//  * FatoorahService constructor
//  * @param Client $request_client
//  */

// public function __cinstruct(Client $request_client ){

//     $this->$request_client = $request_client;
//     $this->$base_url = env('fatoorah_base_url');
//     $this->$headers = [
// 'Content-Type'=>'application/json',
// 'authorization'=> 'Bearer ' . env('fatoorah_token')

//     ];
// }

// /**
//  * @param $url
//  * @param $method
//  * @param array $body
//  * @return false|mixed
//  * @throws \GuzzleHttp\Exception\GuzzleException
//  */
// private function buildRequest($uri, $method, $data = []){
// $request = new Request($method, $this->base_url . $uri, $this->headers);
//     if(!$data)
// return false ;
// $response = $this->request_client->send($request, [
//     'json'=> $data
// ]);

// if($request->getStatusCode() !=200){
//     return false;
// }
// $response = json_decode($response->getBody(), true);
// return $response;

// }

// /**
//  * @param $data
//  */
// public function sendPayment($data){
// //$requestData = $this->parsePaymentData();




// return $response = $this->buildRequest('v2/sendPayment', 'post' , $data);
// // if($response){

// //     $this->saveTransactionPayment($patient_id,$response['Data']['InvoiceId']);
// // }
// // return $response;

// }

// }
