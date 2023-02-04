<?php

namespace App\Services;
use App\Repositories\CategoryProductsRepository;
use App\DataTransferObjects\CategoriesProductsDTO;
use Illuminate\Support\Facades\Cache;
use DB;
/**
 * Class CategoriesProductsServices.
 */
class CategoriesProductsServices
{
    private $categoryProductsRepository;

    public function __construct(
        CategoryProductsRepository $categoryProductsRepository
    ){
        $this->categoryProductsRepository = $categoryProductsRepository;
    }

    public function get($pages){

        Cache::forget('categoriesProducts');
        if (!Cache::has('categoriesProducts')) {
            $categopries = $this->categoryProductsRepository->with(['categoriaPai'])->orderBy('id', 'DESC')->paginate($pages);
            Cache::put('categoriesProducts', $categopries, 600); // 10 Minutes
        } else {
            $categopries = Cache::get('categoriesProducts');
        }
        return $categopries;
    }
    
    public function getById($id){
        return $this->categoryProductsRepository->getById((int)$id);
    }

    public function save(CategoriesProductsDTO $dto){
        DB::beginTransaction();
        try{
            $this->categoryProductsRepository->create($dto->toArray());
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function updateById($id,CategoriesProductsDTO $dto){
        DB::beginTransaction();
        try{
            $this->categoryProductsRepository->updateById($id, $dto->toArray());
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }
    
    public function deleteById($id){
        DB::beginTransaction();
        try{
            $this->categoryProductsRepository->deleteById($id);
            $this->forgetCache();
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }

    public function forgetCache(){
        Cache::forget('categoriesProducts');
    }
}
