<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="font/font.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="scrolltop.css" />

    <!--아이콘 사용-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <style>
        .card label{
            position: absolute;
            background-color: #E3DA4A;
            padding: 5px 10px;
            top:166px;
        }
        .card .date{
            font-size:18px;
            top:20px;
            /*border-radius: 50%;*/
            width:50px;
            right:20px;
        }
    </style>
    <title>Title</title>
</head>

<body>

<div class="container mx-auto">
    <!--제목-->
    <h1 class="text-center" style="font-family: title; font-size: 100px">TeamnovaRanking</h1>

    <div class="btn-group w-100 my-3" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary" onclick="location.href='JavaPage.php' ">기초JAVA</button>
        <button type="button" class="btn btn-secondary"onclick="location.href='AndroidPage.php' ">기초Android</button>
        <button type="button" class="btn btn-secondary"onclick="location.href='PhpPage.php' ">기초PHP</button>
        <button type="button" class="btn btn-secondary"onclick="location.href='Hard1Page.php' ">응용1</button>
        <button type="button" class="btn btn-secondary"onclick="location.href='Hard2Page.php' ">응용2</button>
    </div>

    <?php
    include_once("db_connection.php");
    $sql = "SELECT * FROM RankCrawlingData WHERE rankType = '0' ORDER BY rankingPoint DESC";
    $resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
    $rankID = $row['rankID'];
    $rankTitle = $row['rankTitle'];
    $rankWriter = $row['rankWriter'];
    $createDate = $row['createDate'];
    $detailLink = $row['detailLink'];
    $thumbPath = $row['thumbPath'];
    $viewCount = $row['viewCount'];
    $likeCount = $row['likeCount'];
    $replyCount = $row['replyCount'];
    $rankType = $row['rankType'];
    $rankingPoint = $row['rankingPoint'];
    $ranking = $row[1];

    while( $row = mysqli_fetch_assoc($resultset) ) {
        $ranking++;
        ?>


        <div class="card-deck my-3">


                <div class="card">
                <label class="date text-center" style="font-family: title"><?php echo $ranking; ?></label>
            <!--게시물 이미지-->
            <img alt="" src="<?php echo $row['thumbPath']; ?>" class="card-img-top" alt="...">

            <!--카드 본문-->
            <div class="card-body">
                <!--게시물 제목-->
                <h5 class="card-title"><?php echo $row['rankTitle']; ?></h5>
                <!--게시물 작성자-->
                <p class="card-text"><?php echo $row['rankWriter']; ?></p>
                <p class="card-text">
                    <!--조회수-->
                    <i class="fas fa-eye"></i><small class="text-muted m-1"><?php echo $row['viewCount']; ?></small>
                    <!--좋아요 수-->
                    <i class="fas fa-heart"></i><small class="text-muted m-1"><?php echo $row['likeCount']; ?></small>
                    <!--댓글 수-->
                    <i class="fas fa-comment"></i><small class="text-muted m-1"><?php echo $row['replyCount']; ?></small>
                </p>
                <!--게시물 작성일-->
                <p class="card-text"><i class="fas fa-calendar"></i><small class="text-muted m-1"><?php echo $row['createDate']; ?></small></p>
                <a class="btn btn-primary" href="<?php echo $row['detailLink']; ?>"  >이동하기</a>
            </div>
        </div>

            <div class="card">
                <label class="date text-center" style="font-family: title"><?php echo $ranking; ?></label>
                <!--게시물 이미지-->
                <img alt="" src="<?php echo $row['thumbPath']; ?>" class="card-img-top" alt="...">

                <!--카드 본문-->
                <div class="card-body">
                    <!--게시물 제목-->
                    <h5 class="card-title"><?php echo $row['rankTitle']; ?></h5>
                    <!--게시물 작성자-->
                    <p class="card-text"><?php echo $row['rankWriter']; ?></p>
                    <p class="card-text">
                        <!--조회수-->
                        <i class="fas fa-eye"></i><small class="text-muted m-1"><?php echo $row['viewCount']; ?></small>
                        <!--좋아요 수-->
                        <i class="fas fa-heart"></i><small class="text-muted m-1"><?php echo $row['likeCount']; ?></small>
                        <!--댓글 수-->
                        <i class="fas fa-comment"></i><small class="text-muted m-1"><?php echo $row['replyCount']; ?></small>
                    </p>
                    <!--게시물 작성일-->
                    <p class="card-text"><i class="fas fa-calendar"></i><small class="text-muted m-1"><?php echo $row['createDate']; ?></small></p>
                    <a class="btn btn-primary" href="<?php echo $row['detailLink']; ?>"  >이동하기</a>
                </div>
            </div>

            <div class="card">
                <label class="date text-center" style="font-family: title"><?php echo $ranking; ?></label>
                <!--게시물 이미지-->
                <img alt="" src="<?php echo $row['thumbPath']; ?>" class="card-img-top" alt="...">

                <!--카드 본문-->
                <div class="card-body">
                    <!--게시물 제목-->
                    <h5 class="card-title"><?php echo $row['rankTitle']; ?></h5>
                    <!--게시물 작성자-->
                    <p class="card-text"><?php echo $row['rankWriter']; ?></p>
                    <p class="card-text">
                        <!--조회수-->
                        <i class="fas fa-eye"></i><small class="text-muted m-1"><?php echo $row['viewCount']; ?></small>
                        <!--좋아요 수-->
                        <i class="fas fa-heart"></i><small class="text-muted m-1"><?php echo $row['likeCount']; ?></small>
                        <!--댓글 수-->
                        <i class="fas fa-comment"></i><small class="text-muted m-1"><?php echo $row['replyCount']; ?></small>
                    </p>
                    <!--게시물 작성일-->
                    <p class="card-text"><i class="fas fa-calendar"></i><small class="text-muted m-1"><?php echo $row['createDate']; ?></small></p>
                    <a class="btn btn-primary" href="<?php echo $row['detailLink']; ?>"  >이동하기</a>
                </div>
            </div>

            <div class="card">
                <label class="date text-center" style="font-family: title"><?php echo $ranking; ?></label>
                <!--게시물 이미지-->
                <img alt="" src="<?php echo $row['thumbPath']; ?>" class="card-img-top" alt="...">

                <!--카드 본문-->
                <div class="card-body">
                    <!--게시물 제목-->
                    <h5 class="card-title"><?php echo $row['rankTitle']; ?></h5>
                    <!--게시물 작성자-->
                    <p class="card-text"><?php echo $row['rankWriter']; ?></p>
                    <p class="card-text">
                        <!--조회수-->
                        <i class="fas fa-eye"></i><small class="text-muted m-1"><?php echo $row['viewCount']; ?></small>
                        <!--좋아요 수-->
                        <i class="fas fa-heart"></i><small class="text-muted m-1"><?php echo $row['likeCount']; ?></small>
                        <!--댓글 수-->
                        <i class="fas fa-comment"></i><small class="text-muted m-1"><?php echo $row['replyCount']; ?></small>
                    </p>
                    <!--게시물 작성일-->
                    <p class="card-text"><i class="fas fa-calendar"></i><small class="text-muted m-1"><?php echo $row['createDate']; ?></small></p>
                    <a class="btn btn-primary" href="<?php echo $row['detailLink']; ?>"  >이동하기</a>
                </div>
            </div>


        </div>

    <?php } ?>


    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <script>
        //Get the button:
        mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

    </script>

</body>
</html>
