<?php

class NewsController extends Controller
{
    public function action_create()
    {
        //Проверка на существование данных
        $date = isset($_POST['date']) ? strtotime($_POST['date']) : '' ;
        $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
        $annotation = isset($_POST['annotation']) ? htmlspecialchars($_POST['annotation']) : '';
        $text = isset($_POST['text']) ? htmlspecialchars($_POST['text']) : '';
        $author = isset($_POST['author']) ? htmlspecialchars($_POST['author']) : '';

        $file = new FileModel();
        $content = json_decode($file->get_content(),true);

        //Добавление в массив
        array_push($content, array('date'=>$date, 'title'=>$title, 'annotation'=>$annotation, 'text'=>$text, 'author'=>$author));
        //Запись и закрытие файла

        $file->save_content(json_encode($content));
        $file->close_file();

        echo 'ok';
    }

    public function action_update()
    {

        if (isset($_POST['key'])){

            $key = $_POST['key'];

            $file = new FileModel();
            $content = json_decode($file->get_content(),true);

            //Проверка на существование данных
            $content[$key]['date'] = isset($_POST['up_date']) ? strtotime($_POST['up_date']) : '' ;;
            $content[$key]['title'] = isset($_POST['up_title']) ? htmlspecialchars($_POST['up_title']) : '';;
            $content[$key]['annotation'] = isset($_POST['up_annotation']) ? htmlspecialchars($_POST['up_annotation']) : '';
            $content[$key]['text'] = isset($_POST['up_text']) ? htmlspecialchars($_POST['up_text']) : '';
            $content[$key]['author'] =  isset($_POST['up_author']) ? htmlspecialchars($_POST['up_author']) : '';

            $file->save_content(json_encode($content));
            $file->close_file();

            echo 'ok';
        }
    }

    public function action_delete()
    {
        //Существует ключ для удаления
        if (isset($_POST['key'])){
            $key_del = $_POST['key'];
            //Получаем данные
            $file = new FileModel();
            $content = json_decode($file->get_content(),true);
            //Удаляем ел. в массиве
            unset($content[$key_del]);
            //Обновляем ключи
            $new_arr = array_values($content);
            //Сохраняем обратно
            $file->save_content(json_encode($new_arr));
            $file->close_file();

            echo 'ok';
        }
    }
}