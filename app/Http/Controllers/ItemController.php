<?php

namespace App\Http\Controllers;

use App\Http\Requests\SelectItemRequest;
use App\Services\SelectItemsService;

class ItemController extends Controller
{
    private $selectItemService;

    public function __construct(SelectItemsService $selectItemService)
    {
        $this->selectItemService = $selectItemService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->selectItemService->index();
        return successResponseWithData($items);
    }

    public function selectItems(SelectItemRequest $request){
      return $this->selectItemService->selectItem($request->all());
    }

    public function updateCartItems(SelectItemRequest $request){
        return $this->selectItemService->UpdateCartItem($request->all());
    }

    public function removeCartItems(SelectItemRequest $request){
        return $this->selectItemService->removeCartItem($request->all());
    }
}
