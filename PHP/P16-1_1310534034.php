<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>P16_1310534034_建立圖書類別</title>
</head>
<body>
    <?php
    class Book{
        // 書號
        private $id;
        // 書名
        private $title;
        // 作者
        private $author;
        // 書價
        private $price;

        public $info;

        function __construct($id, $title, $author, $price){
            $this->id = $id;
            $this->title = $title;
            $this->author = $author;
            $this->price = $price;
        }

        function getBook($id){
            $this->info = '<p>書名：' . $this->title . '</p>';
            $this->info .= '<p>作者：' . $this->author . '</p>';
            $this->info .= '<p>書價：' . $this->price . '</p>';
        }

        function showBook(){
            return $this->info;
        }

        function __destruct(){ }
    }
    $book1 = new Book(1, 'PHP Programming1', 'CKW', 550);
    $book2 = new Book(2, 'PHP Programming2', 'CKW', 550);
    $book3 = new Book(3, 'PHP Programming3', 'CKW', 550);
    $book1->getBook(3);
    echo $book1->showBook();
    ?>
</body>
</html>