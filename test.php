<?php

    include 'simple_html_dom.php';
    include 'db_connection.php';

    function crawl_html($url){

        echo $url;

        // curl 시작
        $ch = curl_init();

        //curl 설정
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // 가지고 오기
        $output = curl_exec($ch);
        //echo $output;

        // 문자 인코딩 타입 바꾸기
        $text = iconv("CP949", "UTF-8", $output);
        //http://qmail.kldp.net/phpbb/viewtopic.php?t=7456

        // curl로 가지고 온 html을 사용 가능하게 바꿔줌.
        $html = str_get_html($text);

//        //curl 닫기
//        curl_close();

        return $html;

    }

    //url 배열
    $url = [
        "https://cafe.naver.com/ArticleList.nhn?search.clubid=29412673&search.menuid=22&search.boardtype=C&search.totalCount=101&search.page=", // 자바
        "https://cafe.naver.com/ArticleList.nhn?search.clubid=29412673&search.menuid=26&search.boardtype=C&search.totalCount=101&search.page=", // 안드로이드
        "https://cafe.naver.com/ArticleList.nhn?search.clubid=29412673&search.menuid=27&search.boardtype=C&search.totalCount=86&search.page=",  // PHP
        "https://cafe.naver.com/ArticleList.nhn?search.clubid=29412673&search.menuid=23&search.boardtype=C&search.totalCount=50&search.page=",  // 응용1
        "https://cafe.naver.com/ArticleList.nhn?search.clubid=29412673&search.menuid=24&search.boardtype=C&search.totalCount=40&search.page="   // 응용2
    ];

    // 하루에 한번 새로 데이터를 저장 할때 db에 있는 값을 한번 지우고 다시 저장
    mq("DELETE FROM RankCrawlingData");
    mq("ALTER TABLE RankCrawlingData AUTO_INCREMENT = 1;");

    for($n = 0; $n < count($url); $n++){

        $page = 1;

        $ul = "";

        do{
            $ul = crawl_html($url[$n].$page)->find('ul.article-movie-sub > li');

            if(count($ul) == 0){
                echo "while문 종료";
                break;
            }

            echo "<br>페이지:".$page;

            echo "<br>게시물 갯수 : ".count($ul)."<br>";

            for($i = 0; $i < count($ul); $i++){

                $rank_title_temp = $ul[$i]->find('span.inner')[0]->plaintext;
                $rank_title = trim($rank_title_temp);       // 제목 공백 제거
                echo "제목".$rank_title."<br>";

                $rank_writer = $ul[$i]->find('a.m-tcol-c')[0]->plaintext;
                echo "작성자".$rank_writer."<br>";

                $create_date = $ul[$i]->find('span.date')[0]->plaintext;
                echo "작성일".$create_date."<br>";

                $detail_link = "https://cafe.naver.com".$ul[$i]->find('div.tit_area > a')[0]->href;
                echo "링크".$detail_link."<br>";

                $thumb_path = $ul[$i]->find('div.movie-img > a > img')[0]->src;
                echo "사진".$thumb_path."<br>";

                $view_count_temp = $ul[$i]->find('span.num')[0]->plaintext;
                $view_count = substr($view_count_temp, 7);      // "조회 97" 에서 "조회" 제거
                echo "조회수".$view_count."<br>";

                $like_count = $ul[$i]->find('em.u_cnt.num-recomm')[0]->plaintext;
                echo "좋아요".$like_count."<br>";

                $reply_count = $ul[$i]->find('em.num')[0]->plaintext;
                echo "댓글".$reply_count."<br>";

                $ranking_point = $view_count + ($like_count * 5) + $reply_count;
                echo "점수".$ranking_point."<br>";

                $insert_query = "INSERT INTO RankCrawlingData (rankTitle, rankWriter, createDate, detailLink, thumbPath, viewCount, likeCount, replyCount, rankType, rankingPoint) 
                        VALUES ('$rank_title','$rank_writer','$create_date','$detail_link','$thumb_path',{$view_count},{$like_count},{$reply_count},{$n},{$ranking_point})";

                echo $insert_query."<br><br>";

                mq($insert_query);

            }

            $page++;

        }while(count($ul) != 0);

    }

?>