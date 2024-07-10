<?php
	include 'header.php'; 
	 
	$db = new PDO("mysql:host=localhost;dbname=student", 'root', 'root');

	$id = $_GET['id'] ?? 0;

	$sql = "SELECT *, DATE_FORMAT(`date`, '%d.%m.%Y') AS dateformated  FROM news WHERE id=?";
	$res = $db->prepare($sql);
    $res->bindValue(1, $id, PDO::PARAM_INT);
    $res->execute();
	$row = $res->fetch();
	?>


    <section class="center localnews">
        <nav class="backtracking">
            <a href="index.php">Главная</a> / <a href="#" class="backtracking-active">Возвращение этнографа</a>
        </nav>

        <?php
            if($row) { ?>
                
            <h1 class="localnews__title"><?=$row['title']?></h1>

                    <div class="localnews__left">
                        <div class="news--item__local">
                            <p class="news-item-time"><?=$row['dateformated']?></p>
                            <p class="news--item-title news--item-title__local"><?=strip_tags($row['announce'])?></p>
                            <!-- <p class="localnews__left-text">Сегодня с Проксимы вернулась этнографическая экспедиция под управлением профессора Джона Голдрама из Майхартского университета. Экспедиция работала в джунглях Туманного континента и занималась изучением неконтактного племени двухвостых зюзюмов.</p>
                            <p class="localnews__left-text">"Это племя называет себя Ракатука-Тум-Тум и крайне неохотно контактирует с пришельцами", - сказал Джон Голдрам. На вопрос о том, каковы они - неконтактные зюзюмы, профессор заявил, что неконтактные зюзюмы такие же двухвостые и скандальные как и контактные, только неконтактные.</p>
                            <p class="localnews__left-text">Ждем от профессора Голдрама новых интересных подробностей!</p> -->
                            <p class="localnews__left-text"><?=strip_tags($row['content'])?></p>
                            <a href="index.php" class="news--item-btn news--item-btn--back">
                                <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.293015 8.70711C-0.0975094 8.31658 -0.0975094 7.68342 0.293014 7.2929L6.65698 0.928934C7.0475 0.538409 7.68067 0.538409 8.07119 0.928934C8.46171 1.31946 8.46171 1.95262 8.07119 2.34315L2.41434 8L8.07119 13.6569C8.46171 14.0474 8.46171 14.6805 8.07119 15.0711C7.68067 15.4616 7.0475 15.4616 6.65698 15.0711L0.293015 8.70711ZM26 9L1.00012 9L1.00012 7L26 7L26 9Z" fill="#841844" />
                                </svg>
                                <span>назад к новостям</span>
                            </a>
                        </div>
                        <img src="img/<?=$row['image']?>" height="571" width="740" alt="Картинка">
                    </div>

                <?php } else { include 'error.php';}?>
                

    </section>




    <div class="modal">
        <div class="modal-content">
            <img id="modal-img" src="img/mininews.png" alt="Модалка">
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="js/app.js"></script>
</body>

</html>