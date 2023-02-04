<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryProductsResources;
use App\Http\Resources\CategoryProductsCollection;
use App\DataTransferObjects\CategoriesProductsDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CategoriesProductsRequest;
use App\Services\CategoriesProductsServices;


class CategoryProductsController extends Controller
{
    private $categoriesProductsServices;

    public function __construct(
        CategoriesProductsServices $categoriesProductsServices
    ){
        $this->categoriesProductsServices = $categoriesProductsServices;
    }

    public function get($pages): JsonResponse
    {
        $client = $this->categoriesProductsServices->get($pages);
        return response()->json(new CategoryProductsCollection($client->all()));
    }

    public function getById($id): JsonResponse
    {
        $client = $this->categoriesProductsServices->getById($id);
        return response()->json(new CategoryProductsResources($client));
    }
    
    public function store(CategoriesProductsRequest $request)
    {
        $dto = new CategoriesProductsDTO($request->all());
        try{
            return $this->categoriesProductsServices->save($dto);
        }catch(Exception $e){
            return $e->message();
        }
    }

    public function updateById($id, CategoriesProductsRequest $request)
    {
        $dto = new CategoriesProductsDTO($request->all());
        try{
            return $this->categoriesProductsServices->updateById($id, $dto);
        }catch(Exception $e){
            return $e->message();
        }
    }
    
    public function deleteById($id)
    {
        try{
            return $this->categoriesProductsServices->deleteById($id);
        }catch(Exception $e){
            return $e->message();
        }
    }
}
