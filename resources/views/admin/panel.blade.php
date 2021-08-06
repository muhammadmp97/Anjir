<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انجیر - تنظیمات</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div class="container">
    <div class="book-box vazir">
        <div class="book-loaded-content-parent" style="">
            <div class="col-lg-4 text-align-center">
                <img src="/images/book_cover.jpg" class="cover-photo"></div>
            <div class="col-lg-8">
                <h2 class="mb-4 mt-0 bolder">تنظیمات</h2>

                <h3 class="fs-19">ویرایش مشخصات کتاب</h3>

                <form action="{{ url('/panel/book') }}" method="post" enctype="multipart/form-data">
                    @csrf @method('put')

                    @if ($errors->any())
                        <ul class="color-red">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <br>
                    @endif

                    <label for="bookTitle">عنوان کتاب:</label><br>
                    <input name="title" type="text" id="bookTitle" class="form-input w-75" value="{{ $data['title'] }}">
                    <br><br>

                    <label for="bookAuthor">نویسنده:</label><br>
                    <input name="author" type="text" id="bookAuthor" class="form-input mt-3 w-75" value="{{ $data['author'] }}">
                    <br><br>

                    <label for="bookDescription">توضیحات کتاب:</label><br>
                    <textarea name="description" id="bookDescription" class="form-input w-75" cols="30" rows="10">{{ $data['description'] }}</textarea>
                    <br><br>

                    <label for="bookVersion">نسخه‌ی کتاب:</label><br>
                    <input name="version" type="text" id="bookVersion" class="form-input mt-3 w-75" value="{{ $data['version'] }}">
                    <br><br>

                    <label for="bookPrice">قیمت (تومان):</label><br>
                    <input name="price" type="text" id="bookPrice" class="form-input mt-3 w-75" value="{{ $data['price'] }}">
                    <br><br>

                    <label for="coverPhoto">تصویر جدید:</label><br>
                    <input name="cover_photo" type="file" id="coverPhoto" class="form-input mt-3 w-75">
                    <br><br>

                    <label for="bookFile">نسخه جدید کتاب:</label><br>
                    <input name="book_file" type="file" id="bookFile" class="form-input mt-3 w-75">
                    <br><br>

                    <button type="submit" class="b-button b-button-red fs-17 float-right ml-10">ثبت تغییرات</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/app.js"></script>
</body>
</html>