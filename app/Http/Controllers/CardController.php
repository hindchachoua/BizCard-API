<?php

namespace App\Http\Controllers;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/**
 * @OA\Tag(
 *     name="Cards",
 *     description="Endpoints for card management"
 * )
 */
class CardController extends Controller
{
   /**
     * @OA\Get(
     *     path="/api/cards",
     *     summary="Get all cards",
     *     tags={"Cards"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Returns all cards",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="cards", type="array", @OA\Items(type="object"))
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No cards found",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="No cards found")
     *         )
     *     )
     * )
     */
    public function index()
    {
      
        $cards =   Auth::user()->cards;
        return $cards;
    }

    public function getcardwithuser(string $name){
        $cards = User::where('name', $name)->first()->cards;
        return $cards;
    }

/**
 * @OA\Post(
 *     path="/api/cards/add",
 *     summary="Create a new card",
 *     tags={"Cards"},
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={ "title", "description" , "phonenumber", "email"},
 *             @OA\Property(property="title", type="string"),
 *             @OA\Property(property="description", type="string"),
 *             @OA\Property(property="phonenumber", type="string", example="1234567890"),
 *             @OA\Property(property="email", type="string", format="email"),
 *             @OA\Property(property="address", type="string"),
 *             @OA\Property(property="website", type="string", format="uri"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Card added successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="integer", example=200),
 *             @OA\Property(property="message", type="string", example="Card Added Successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="integer", example=500),
 *             @OA\Property(property="message", type="string", example="Error")
 *         )
 *     )
 * )
 */

    public function store(Request $request)
    {
        $validators = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'phonenumber' => 'required',
            'email' => 'required',
            'address' => 'required',
            // 'user_id' => 'required',
        ]);
        $validators ['user_id'] = Auth::user()->id;

        return Card::create($validators);
    }

     /**
     * @OA\Get(
     *     path="/api/cards/{id}",
     *     summary="Get a card by ID",
     *     tags={"Cards"},
     * security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the card",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Returns the card",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="card", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found!",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="Not Found!")
     *         )
     *     )
     * )
     */
    public function show(string $id)
    {
        return Card::find($id);
    }

/**
 * @OA\Put(
 *     path="/api/cards/{id}/update",
 *     summary="Update a card",
 *     tags={"Cards"},
 * security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the card",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"title","description" ,"phonenumber", "email"},
 *             @OA\Property(property="title", type="string"),
 *             @OA\Property(property="description", type="string"),
 *             @OA\Property(property="phonenumber", type="string", example="1234567890"),
 *             @OA\Property(property="email", type="string", format="email"),
 *             @OA\Property(property="address", type="string"),
 *             @OA\Property(property="website", type="string", format="uri"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Card updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="integer", example=200),
 *             @OA\Property(property="message", type="string", example="Card Updated Successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Error, Not Found!",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="integer", example=404),
 *             @OA\Property(property="message", type="string", example="Error, Not Found!")
 *         )
 *     )
 * )
 */
    public function update(Request $request, string $id)
    {
        $card = Card::find($id);
        //dd($card);
        $card->update($request->all());
        return $card;
    }
 /**
     * @OA\Delete(
     *     path="/api/cards/{id}/destroy",
     *     summary="Delete a card",
     *     tags={"Cards"},
     * security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the card",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Card deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Deleted Successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Error, Not Found!",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="Error, Not Found!")
     *         )
     *     )
     * )
     */
    public function destroy(string $id)
    {
        if (Card::find($id)) {
            Card::destroy($id);
            return response()->json(['message' => 'Card deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Error, Not Found!'], 404);
        }
    }
}
