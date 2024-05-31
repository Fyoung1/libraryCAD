<?php

namespace app\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\book;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{
    //Вывод списка книг в админ панель
    public function showAdminPanel()
    {
        $Books=book::all();
        return view('page.Admin.AdminPanelPage',compact('Books'));
    }

    //Выбор книги
    public function CheckBookAdmin($id)
    {
        $CheckBookAdmin = book::find($id);
        return view('page.Admin.AdminCheckBookPage', compact('CheckBookAdmin'));
    }

    //Редактирование книги
    public function EditBookAdmin($id)
    {
        $name = $_GET['name'];
        $author = $_GET['author'];
        $year_of_publication= $_GET['year_of_publication'];
        $availability= $_GET['availability'];
        if(!empty($name))
        {
            DB::table('books')->where('id',$id)->update(['name' => $name]);
        }
        if(!empty($author))
        {
            DB::table('books')->where('id',$id)->update(['author' => $author]);
        }
        if(!empty($year_of_publication))
        {
            DB::table('books')->where('id',$id)->update(['year_of_publication' => $year_of_publication]);
        }
        if(!empty($availability))
        {
            DB::table('books')->where('id',$id)->update(['availability' => $availability]);
        }
        return response()->json(['message' => 'Вы успешно изменили данные']);
    }

    //Удаление книги
    public function DeleteBookAdmin($id)
    {
        DB::table('books')->where(['id' => $id])->delete();
        return response()->json(['message' => 'Книга успешно удалена']);
    }

    //Переход на страницу с добавлением книги
    public function AddBookAdmin()
    {
        return view('page.Admin.AdminAddBookPage');
    }

    //Добавление книги в бд
    public function AddToBaseBookAdmin()
    {
        $name = $_GET['name'];
        $author = $_GET['author'];
        $year_of_publication= $_GET['year_of_publication'];
        $image= $_GET['image'];

        DB::table('books')->insert(['name' => $name, 'author' => $author,'year_of_publication'=>$year_of_publication,'availability'=>'Доступно','image'=>$image]);
        return response()->json(['message' => 'Книга успешно добавлена']);
    }

}
