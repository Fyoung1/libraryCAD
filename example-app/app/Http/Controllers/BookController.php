<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\reserve;
use App\Models\book;

class BookController extends Controller
{
    //Вывод забронированных книг пользователем
    public function ShowBooks()
    {
        $userId=Auth::id();
        $MyBooks = DB::table('reserve')
            ->join('books', 'reserve.id_books', '=', 'books.id')
            ->where('reserve.id_users', $userId)
            ->select('books.*')
            ->get();
        return view('page.MyReservedBooksPage', compact('MyBooks'));
    }

    //Бронирование книги пользователем
    public function ReserveBook($id)
    {
        $userId=Auth::id();

        $existingFavorite = DB::table('reserve')
            ->where('id_users', $userId)
            ->where('id_books', $id)
            ->first();

        if ($existingFavorite) {
            return response()->json(['message' => 'Книга уже забронирована']);
        }

        DB::table('books')->where('id',$id)->update(['availability' => 'забронировано']);

        DB::table('reserve')->insert(['id_users' => $userId, 'id_books' => $id]);
        return response()->json(['message' => 'Книга успешно забронирована']);
    }

    //Возврат раннее забронированной книги
    public function ReturnBook($id)
    {
        $userId=Auth::id();
        DB::table('reserve')->where(['id_users' => $userId, 'id_books' => $id])->delete();
        DB::table('books')->where('id',$id)->update(['availability' => 'Доступно']);
        return response()->json(['message' => 'Книга успешно возвращена']);
    }
    //Поиск книги по названию
    public function SearchBookForName()
    {
        $name = $_GET['name'];
        $BookForName = book::where('name', $name)->first();
        return response()->json(['message' => $BookForName]);
    }
    //Поиск книги по айди
    public function SearchBookForId()
    {
        $id = $_GET['id'];
        $BookForId= book::where('id', $id)->first();
        return response()->json(['message' => $BookForId]);
    }

}
