
    <form action="news/create" method="post" class="form_create" name="form_create" id="form_create">
        <h4>Добавить новость:</h4>

        <label for="date">Дата:</label>
        <input type="date" name="date" id="date" required>

        <label for="title">Заголовок</label>
        <input type="text" name="title" id="title" required>

        <label for="annotation">Превью</label>
        <textarea id="annotation" name="annotation" required></textarea>

        <label for="text">Текст</label>
        <textarea id="text" name="text" required></textarea>

        <label for="author">Автор</label>
        <input type="text" name="author" id="author" required>

        <div class="btns">
            <button id="create">Create</button>
        </div>
    </form>


    <h3>Новости:</h3>
    <table>
        <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Annotation</th>
            <th>Text</th>
            <th>Author</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($news as $key=>$item){
            echo '<tr>
                <td id="date_'.$key.'">'.date('Y-m-d',$item['date']).'</td>
                <td id="title_'.$key.'">'.$item['title'].'</td>
                <td id="annotation_'.$key.'">'.$item['annotation'].'</td>
                <td id="text_'.$key.'">'.$item['text'].'</td>
                <td id="author_'.$key.'">'.$item['author'].'</td>
                <td class="action"><span class="update" data-key="'.$key.'">Update</span><span class="delete" data-key="'.$key.'">Delete</span></td>
              </tr>';
        }

        ?>

    </table>

    <div class="modal">

        <div class="preview_form">
            <span class="close">&times;</span>
            <form action="news/update" method="post" class="form_update" name="form_update" id="form_update">
                <h4>Добавить новость:</h4>

                <label for="up_date">Дата:</label>
                <input type="date" name="up_date" id="up_date">

                <label for="up_title">Заголовок</label>
                <input type="text" name="up_title" id="up_title">

                <label for="up_annotation">Превью</label>
                <textarea id="up_annotation" name="up_annotation"></textarea>

                <label for="up_text">Текст</label>
                <textarea id="up_text" name="up_text"></textarea>

                <label for="up_author">Автор</label>
                <input type="text" name="up_author" id="up_author">

                <input type="hidden" value="" id="key" name="key">

                <div class="btns">
                    <button id="update">update</button>
                </div>
            </form>
        </div>
    </div>







